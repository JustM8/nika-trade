<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ProductsController extends Controller
{
    public function show(Product $product)
    {
//        $product = Product::where('slug','=',$slug)->first();
        $recommendedProducts = $product->recommendedProducts;
//dd($product,$recommendedProducts);
        return view('products.show',['title'=>__('catalog.Title').' - '.$product->title[App::currentLocale()]], compact('product','recommendedProducts'));
    }
}
