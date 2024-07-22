<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $orders = Order::orderBy('created_at', 'DESC')->paginate(50);
//        dd($orders);
        return view('admin/dashboard/index',['title'=>'dashboard.Title']);
    }

}
