<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    public function index(Request $request)
{
    $query = Product::query();

    if ($request->keyword) {
        $query->where('name', 'like', '%' . $request->keyword . '%');
    }

    if ($request->sort == 'asc') {
        $query->orderBy('price', 'asc');
    }

    if ($request->sort == 'desc') {
        $query->orderBy('price', 'desc');
    }

    $products = $query->paginate(6);

    return view('products.index', compact('products'));
}
    //$products = Product::all();
   // $products = Product::with('seasons')->get();
    public function show($productId)
{
    $product = Product::findOrFail($productId);

    return view('products.show', compact('product'));
}
    public function update(Request $request)
{
    $product = Product::find($request->id);

    $product->name = $request->name;
    $product->price = $request->price;
    $product->season = $request->season;
    $product->description = $request->description;

    $product->save();

    return redirect()->route('products.index');
}


    public function delete(Request $request)
{
    $product = Product::find($request->id);

    $product->delete();

    return redirect()->route('products.index');
}
    public function register()
{
    return view('products.register');
}
}
    
