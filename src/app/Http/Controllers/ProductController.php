<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductRequest;


class ProductController extends Controller
{
    public function index()
{
    $products = product::paginate(6);

    return view('products.index', compact('products'));
}
    

    public function show($productId)
{
    $product = Product::findOrFail($productId);

    return view('products.show', compact('product'));
}
    public function update(ProductRequest $request)
{
    $request->validate([
    'name' => 'required|max:100',
    'price' => 'required|integer|min:0|max:10000',
    'season' => 'required',
    'description' => 'required|max:120',
    'images' => 'nullable|mimes:jpeg,png'
   ]);

    $product = Product::find($request->id);

    $product->name = $request->name;
    $product->price = $request->price;
    $product->season = $request->season;
    $product->description = $request->description;

    if ($request->hasFile('image')) {

        $file = $request->file('image');
        $filename = $file->getClientOriginalName();

        $file->move(public_path('images/fruits-img'), $filename);

        $product->image = $filename;
    }

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
    public function store(ProductRequest $request)
    {
        $request->validate([
         'name' => 'required|max:100',
         'price' => 'required|integer|min:0|max:10000',
         'season' => 'required',
         'description' => 'required|max:120',
         'image' => 'required|mimes:png,jpeg'
        ]);
        $product = new Product();

        $product->name = $request->name;
        $product->price = $request->price;
        $product->season = $request->season;
        $product->description = $request->description;

        if($request->hasFile('image')){

            $file = $request->file('image');
            $filename = $file->getClientOriginalName();

            $file->move(public_path('images/fruits-img'),$filename);

            $product->image = $filename;
        }

        $product->save();

        return redirect()->route('products.index');
    }
     
    public function search(Request $request)
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
   }}