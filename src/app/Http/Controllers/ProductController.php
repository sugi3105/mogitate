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
    
}
    
