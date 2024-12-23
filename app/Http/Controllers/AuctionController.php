<?php

namespace App\Http\Controllers;

use App\Events\AddProduct;
use App\Models\Auction;
use App\Models\Bid;
use App\Models\Product;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AuctionController extends Controller
{
    public function index()
    {
        request()->validate([
            'status' => 'nullable|string|in:live,upcoming,ended',
            'name' => 'nullable|string'
        ]);
        $query = Auction::query();
        if ($status = request('status')) {
            $query->where('status', $status);
        }
        if ($name = request('name')) {
            $query->where('name', 'like', '%' . $name . '%');
        }
        $auctions = $query
            ->orderByRaw('CASE
                                WHEN status = "live"
                                THEN 1 WHEN status = "upcoming"
                                THEN 2 WHEN status = "ended"
                                THEN 3 ELSE 4 END'
            )->simplePaginate(8);
        return view('auctions.index', [
            'auctions' => $auctions,
        ]);
    }

    public function show(Auction $auction)
    {
        $products = $auction->product()->get();
        if ($auction->status == 'live') {
            $products1 = $auction->product()->where('status', 'in-auction')->get();
            $detachProducts = $auction->product()->where('status', '!=', 'in-auction')->get();
            $detachProductIds = $detachProducts->pluck('id')->toArray();
            $auction->product()->detach($detachProductIds);
            foreach ($detachProducts as $product) {
                $product->update(['status' => 'active']);
            }
            return view('auctions.show-live', [
                'products' => $products1,
                'auction' => $auction,
            ]);
        } elseif ($auction->status == 'upcoming') {
            return view('auctions.show', [
                'products' => $products,
                'auction' => $auction
            ]);
        } else {
            return view('auctions.show-end', [
                'auction' => $auction,
                'results' => $auction->result
            ]);
        }
    }

    public function addProduct(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'auction_id' => 'required|exists:auctions,id',
        ]);
        $product = Product::find($request->product_id);
        $product->bid()->delete();
        $product->status = 'pending';
        $product->save();
        $auction = Auction::find($request->auction_id);
        $auction->product()->attach($request->product_id);
        broadcast(new AddProduct($product));
    }

    public function store()
    {
        request()->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'start_time' => 'required|date',
            'end_time' => ['required', 'date', 'after:start_time'],
            'category' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'bid_step' => 'required|integer',
        ]);
        $imagePath = null;
        if ($file = request()->file('image')) {
            $imageName = Str::random(20) . '.' . $file->getClientOriginalExtension(); // VD: abc123xyz456.jpg
            $imagePath = $file->storeAs('/public/images', $imageName);
        }
        Auction::create([
            'name' => request('name'),
            'description' => request('description'),
            'start_time' => request('start_time'),
            'end_time' => request('end_time'),
            'category' => request('category'),
            'image' => str_replace('public/', '', $imagePath),
            'bid_step' => request('bid_step'),
        ]);
        return redirect()->route('auction.index');
    }

    public function destroy()
    {
        request()->validate([
            'auction_id' => 'required|integer|exists:auctions,id'
        ]);
        Auction::destroy(request('auction_id'));
        return 'hehe';
    }

    public function endAuction(Auction $auction)
    {
        $allProductIds = $auction->product()->select('products.id')->pluck('id');
        $bidProductIds = DB::table('bids')
            ->where('auction_id', $auction->id)
            ->pluck('product_id');
        $noBidProductIds = $allProductIds->diff($bidProductIds);
        Product::whereIn('id', $bidProductIds)->update(['status' => 'sold']);
        Product::whereIn('id', $noBidProductIds)->update(['status' => 'active']);
        $subQuery = DB::table('bids')
            ->select('product_id', DB::raw('MAX(id) as max_id')) // Tìm id lớn nhất cho mỗi product_id
            ->where('auction_id', $auction->id)
            ->whereIn('product_id', $bidProductIds)
            ->groupBy('product_id');
        $lastBidIds = DB::table('bids')
            ->joinSub($subQuery, 'latest_bids', function ($join) {
                $join->on('bids.id', '=', 'latest_bids.max_id'); // Join với id lớn nhất
            })
            ->pluck('bids.id');
        foreach ($lastBidIds as $id) {
            $bid = Bid::find($id);
            $bid->user->product()->attach($bid->product->id, ['action_type' => 'buy']);
            Result::create([
                'auction_id' => $auction->id,
                'product_name' => $bid->product->name,
                'product_price' => $bid->product->price,
                'bid_price' => $bid->bid_price,
                'winner_name' => $bid->user->name,
                'winner_email' => $bid->user->email,
            ]);
        }
        foreach ($noBidProductIds as $product_id) {
            Result::create([
                'auction_id' => $auction->id,
                'product_name' => Product::find($product_id)->name,
                'product_price' => Product::find($product_id)->price,
            ]);
        }
        $auction->status = 'ended';
        $auction->save();
        return redirect()->back();
    }

    public function startAuction(Auction $auction)
    {
        $auction->status = 'live';
        $auction->save();
        return redirect()->back();
    }
}
