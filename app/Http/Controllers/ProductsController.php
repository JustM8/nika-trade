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
        $childrens = $product->children;
        $breadcrumbs = array_reverse($product->breadcrumbs);
//        dd($breadcrumbs);
        $recommendedProducts = $product->recommendedProducts;
        $categorySlug = $this->getCategorySlug($product->id);
//        dd($breadcrumbs);
        //json output for front
//        return response()->json(['cur'=>$product,'recommended'=>$recommendedProducts,'lang'=>App::currentLocale()]);
        return view('products.show',
            ['title'=>__('catalog.Title').' - '.$product->title[App::currentLocale()]],
            compact('product','recommendedProducts','childrens','categorySlug','breadcrumbs')
        );
    }

    public function getCategorySlug($productId)
    {
        $product = Product::find($productId);

        if ($product) {
            $category = $product->category;

            if ($category) {
                $categorySlug = $category->slug;
                return $categorySlug;
            } else {
                return "Категорія не визначена";
            }
        } else {
            return "Товар не знайдено";
        }
    }
}
