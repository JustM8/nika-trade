<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
use App\Models\Order;
use App\Models\Product;
use App\Repositories\Contracts\OrderRepositoryContract;
use App\Repositories\ProductRepository;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Repositories\OrderRepository;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    public function __construct(protected OrderRepository $repository)
    {
    }
//    public function __invoke(Request $request)
//    {
//        dd($request);
//    }
    public function index(Request $request)
    {

    }

    public function create(CreateOrderRequest $request)
    {
        try {
            DB::beginTransaction();

            $total = Cart::instance('cart')->total(2, '.', '');
            $request = $request->validated();

            $order = $this->repository->create($request, $total);

            DB::commit();
            if(isset($order->id)){
              return  redirect()->route('thankYou',['orderId'=>$order->id]);
//                $this->thankYou($order->id);
            }
//            return response()->json($order);

        } catch (\Exception $exception) {
            DB::rollBack();
            logs()->warning($exception);
            return response()->json(['error' => $exception->getMessage()], 422);
        }
    }

    public function thankYou(string $orderId)
    {

        Cart::instance('cart')->destroy();
        $order = Order::with(['user','products'])->where('id',$orderId)->firstOrFail();

        return view('thankyou/summary', compact('order'));
    }
}
