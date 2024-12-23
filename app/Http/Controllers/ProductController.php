<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        request()->validate([
            'category_id' => 'nullable|integer|exists:categories,id',
            'name' => 'nullable|string'
        ]);
        $query = Product::query();
        if ($id = request('category_id')) {
            $query->where('category_id', $id);
        }
        if($name = request('name')){
            $query->where('name','like','%'.$name.'%');
        }
        $products = $query->latest()->simplePaginate(8);
        return view('products.index', [
            'products' => $products
        ]);
    }

    public function destroy()
    {
        request()->validate([
            'product_id' => 'required|integer|exists:products,id'
        ]);
        Product::destroy(request('product_id'));
    }

    public function fav($id)
    {
        $user = \Auth::user();
        if ($user->product()->wherePivot('product_id', $id)->wherePivot('action_type', 'fav')->exists()) {
            $user->product()->newPivotStatementForId($id)
                ->where('action_type', 'fav')
                ->delete();
        } else {
            $user->product()->attach($id, ['action_type' => 'fav']);
        }
        return redirect()->back();
    }

    public function store()
    {
        request()->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'required|integer|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|integer|exists:categories,id'
        ],['price.min' => 'Price must be at least 1']);
        $imagePath = null;
        if ($file = request()->file('image')) {
            $imageName = Str::random(20) . '.' . $file->getClientOriginalExtension(); // VD: abc123xyz456.jpg
            $imagePath = $file->storeAs('/public/images', $imageName);
        }
        $product = Product::create([
            'name' => request('name'),
            'description' => request('description'),
            'price' => request('price'),
            'image' => str_replace('public/', '', $imagePath),
            'category_id' => request('category_id'),
        ]);
        Auth::user()->product()->attach($product->id, ['action_type' => 'own']);
        return redirect()->route('product.index');
    }

    public function approve(Product $product)
    {
        $product->status = 'in-auction';
        $product->save();
        return redirect()->back();
    }

    public function reject(Product $product)
    {
        $product->status = 'pending';
        $product->save();
        return redirect()->back();
    }
    public function edit(Product $product){
        return view('products.edit',[
            'product' => $product
        ]);
    }
    public function update(Product $product){
        if($product->status === 'in-auction'){
            return redirect()->back()->withErrors(['error' => 'Product is in an auction']);
        }
        request()->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'required|integer|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|integer|exists:categories,id'
        ],['price.min' => 'Price must be at least 1']);
        $imagePath = $product->image;
        if ($file = request()->file('image')) {
            $imageName = Str::random(20) . '.' . $file->getClientOriginalExtension(); // VD: abc123xyz456.jpg
            $imagePath = $file->storeAs('/public/images', $imageName);
        }
        $product->update([
            'name' => request('name'),
            'description' => request('description'),
            'price' => request('price'),
            'image' => str_replace('public/', '', $imagePath),
            'category_id' => request('category_id'),
        ]);
        return redirect()->route('product.index');
    }
}
