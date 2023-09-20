<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ProductsController extends Controller
{
    protected $result = [];
    public function index(Product $product)
    {
        $recommendedProducts = $product->recommendedProducts;

        $data['cur'] =
            [
                'id'=> $product->id,
                'category_id'=> $product->category_id,
                'title'=> $product->title[App::currentLocale()],
                'description'=> $product->description[App::currentLocale()],
                'slug'=> $product->slug,
                'SKU'=> $product->SKU,
                'price'=> $product->price,
                'discount'=> $product->discount,
                'in_stock'=> $product->in_stock,
                'thumbnail'=> $product->thumbnailUrl,
            ];

        return response()->json($data);
    }

    public function cart(Request $request)
    {
        $ids = $request->all();
        $products = Product::whereIn('id', $ids)->get();
//        $result = [];
        foreach ($products as $product)
        {
            $this->result[] = [
                  'id'=> $product->id,
                  'category_id'=> $product->category_id,
                  'parent_id' => $product->parent_id,
                  'title'=> $product->title[App::currentLocale()],
                  'slug' => $product->slug,
                  'SKU' =>  $product->SKU,
                  'size'=>  $product->size,
                  'price' =>  $product->price,
                  'discount' => $product->discount,
                  'in_stock' =>  $product->in_stock,
                  'thumbnail' =>  $product->thumbnailUrl,
            ];
        }
        return response()->json($this->result);
    }

//    public function getCart(Request $request)
//    {
//        return response()->json($this->result);
//    }
}

