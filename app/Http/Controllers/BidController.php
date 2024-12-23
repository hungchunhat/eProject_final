<?php

namespace App\Http\Controllers;

use App\Events\BidInc;
use App\Models\Bid;
use App\Models\Product;
use Illuminate\Http\Request;

class BidController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'user_id' => 'required|exists:users,id',
            'auction_id' => 'required|exists:auctions,id',
            'bid_step' => 'required|integer',
        ]);
        $product = Product::find($request->product_id);
        if($product->bid->isEmpty()){
            $current_price = $product->price;
        }else{
            $current_price = $product->bid->last()->bid_price;
        }
        $bidIncrement = (float) $request->bid_step;
        $bid_price = $current_price + $bidIncrement;
        $bid = Bid::create([
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'auction_id' => $request->auction_id,
            'bid_price' => $bid_price,
        ]);
        broadcast(new BidInc($bid));
    }
}
