<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke()
    {
//        $orders = Order::with('order_product')
//            ->where('order_id','id');
//        dd($orders);
        return view('admin/dashboard/index',['title'=>'dashboard.Title']);
    }

}
