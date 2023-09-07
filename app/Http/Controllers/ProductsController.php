<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function show($slug)
    {
        $product = Product::where('slug','=',$slug)->first();
        $recommendedProducts = $product->recommendedProducts;

        return view('products.show', compact('product','recommendedProducts'));
    }
}
