<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ProductsController extends Controller
{
    public function index(Product $product)
    {
        $recommendedProducts = $product->recommendedProducts;
        $product->thumbnail = $product->thumbnailUrl;
        $product->obj_model = $product->objmodelUrl;
        return response()->json(['cur'=>$product,'recommended'=>$recommendedProducts,'lang'=>App::currentLocale()]);
    }
}
