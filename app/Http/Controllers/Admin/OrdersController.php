<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Repositories\OrderRepository;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function __construct(protected OrderRepository $repository)
    {
    }

    public function index(Request $request)
    {
        $orders = Order::paginate(10);
//        dd($orders);
        return view('admin.orders.index', ['title' => __('order.Orders')], compact('orders'));
    }

    public function show(Order $order)
    {
        return view('admin.orders.show', ['title' => __('order.Orders')], compact('order'));
    }
}
