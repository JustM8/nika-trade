<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('cart/index', ['title' => __('cart.Title')]);
    }

    public function add(Product $product)
    {
        Cart::instance('cart')->add(
            $product->id,
            $product->title,
            1,
            $product->endPrice,
            0,
            ['slug' => $product->slug],
        )->associate(Product::class);

//        notify()->success("Product was added to the cart", position: "topRight");
//        return redirect()->back();
        return response()->json(['message'=>'Product added']);
    }

    public function remove(Request $request)
    {
        Cart::instance('cart')->remove($request->rowId);

        notify()->success("Product was removed", position: "topRight");

        return redirect()->back();
    }

    public function countUpdate(Request $request, Product $product)
    {
        if ($product->in_stock < $request->product_count) {
            notify()->error("Max count of current product is {$product->in_stock}", position: "topRight");
            return redirect()->back();
        }

        Cart::instance('cart')->update(
            $request->rowId,
            $request->product_count
        );

        notify()->success("Product count was updated", position: "topRight");

        return redirect()->back();
    }

}
