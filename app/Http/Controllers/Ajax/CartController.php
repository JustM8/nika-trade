<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;



class CartController extends Controller
{
    public function index()
    {
        return view('cart/index', ['title' => __('cart.Title')]);
    }

    public function add(Request $request, Product $product)
    {
        if (!$request->session()->has('cart_id')) {
            $cartId = Str::random(10);
            $request->session()->put('cart_id', $cartId);
        }
        $cartId = $request->session()->get('cart_id');

        $filtered = Cart::instance($cartId)->content()->where('id', $product->id)->first();

        if (!$filtered) {
            Cart::instance($cartId)->add(
                $product->id,
                $product->title,
                1,
                $product->endPrice,
                0,
                ['slug' => $product->slug, 'SKU' => $product->SKU],
            )->associate(Product::class);
            return response()->json(['message'=>'Product added']);
        }
        else{
            return response()->json(['message' => 'Product count at the same level']);
        }
    }

    public function remove(Request $request)
    {
        $cartId = $request->session()->get('cart_id');
        Cart::instance($cartId)->remove($request->rowId);
        notify()->success("Product was removed", position: "topRight");
        return response()->json(['message'=>'Product delete']);
    }

    public function countUpdate(Request $request, Product $product)
    {
        $count = $request->count;
        $cartId = $request->session()->get('cart_id');

        if ($product->in_stock < $request->product_count) {
            return response()->json(['message'=>"Max count of current product is {$product->in_stock}"]);
        }

        if (is_numeric($count) && is_int((int)$count) && (int)$count > 0) {
            Cart::instance($cartId)->update(
                $request->rowId,
                $count
            );
            return response()->json(['message' => 'Product count was updated']);
        }else{
            return response()->json(['message' => 'Product count at the same level']);
        }

    }

    public function getCardPopup(Request $request)
    {
        $cartId = $request->session()->get('cart_id');
        if(Cart::instance($cartId)->count() > 0) {
            (Cart::instance($cartId)->content()->count() > 0)? $count = Cart::instance('cart')->content()->count(): $count = 0;
            $row = Cart::instance($cartId)->content();
            $html = View::make('cart.parts.cart_popup', compact('row'))->render();
            return response()->json(['html' => $html, 'total'=>Cart::total(), 'count'=>$count]);
        }else
        {
            return response()->json(['html' => __('cart.empty'), 'total'=>Cart::total(), 'count'=>0]);
        }
    }
}
