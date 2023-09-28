<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

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
            ['slug' => $product->slug,'SKU'=>$product->SKU],
        )->associate(Product::class);

//        notify()->success("Product was added to the cart", position: "topRight");
//        return redirect()->back();
        return response()->json(['message'=>'Product added']);
    }

    public function remove(Request $request)
    {

        Cart::instance('cart')->remove($request->rowId);

        notify()->success("Product was removed", position: "topRight");

        return response()->json(['message'=>'Product delete']);
//        return redirect()->back();
    }

    public function countUpdate(Request $request, Product $product)
    {
//        dd($request->count,$request->rowId);
        if ($product->in_stock < $request->product_count) {
//            notify()->error("Max count of current product is {$product->in_stock}", position: "topRight");
//            return redirect()->back();
            return response()->json(['message'=>"Max count of current product is {$product->in_stock}"]);
        }

        Cart::instance('cart')->update(
            $request->rowId,
            $request->count
        );
        return response()->json(['message'=>'Product count was updated']);
//        notify()->success("Product count was updated", position: "topRight");

//        return redirect()->back();
    }

    public function getCardPopup()
    {
        if(Cart::instance('cart')->count() > 0) {
            $row = Cart::instance('cart')->content();
            $html = View::make('cart.parts.cart_popup', compact('row'))->render();

            return response()->json(['html' => $html]);
        }
    }
}
