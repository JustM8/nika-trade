<?php
namespace App\Http\Controllers;

use App\Models\MainPage;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class CartController extends Controller
{
    public function index()
    {
        $mainPage = MainPage::all();
        return view('cart/index',['title'=>__('cart.page_title')],compact('mainPage'));
    }

    public function add(Request $request, Product $product)
    {
        if (!$request->session()->has('cart_id')) {
            $cartId = Str::random(10);
            $request->session()->put('cart_id', $cartId);
        }

        $cartId = $request->session()->get('cart_id');

        if($product->parent_id != null) {
            Cart::instance($cartId)->add(
                $product->id,
                $product->title,
                $request->product_count,
                $product->endPrice,
                0,
                ['slug' => $product->slug],
            )->associate(Product::class);

//        notify()->success("Product was added to the cart", position: "topRight");
            return redirect()->back();
        }
//        return response()->json(['message'=>'Product added']);
    }

    public function remove(Request $request)
    {
        $cartId = $request->session()->get('cart_id');
        Cart::instance($cartId)->remove($request->rowId);

        notify()->success("Product was removed", position: "topRight");

        return redirect()->back();
    }

    public function countUpdate(Request $request, Product $product)
    {
        $cartId = $request->session()->get('cart_id');
        if($product->parent_id != null) {
            if ($product->in_stock < $request->product_count) {
                notify()->error("Max count of current product is {$product->in_stock}", position: "topRight");
                return redirect()->back();
            }

            Cart::instance($cartId)->update(
                $request->rowId,
                $request->product_count
            );

            notify()->success("Product count was updated", position: "topRight");

            return redirect()->back();
        }
    }

}
