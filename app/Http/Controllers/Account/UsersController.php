<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UpadateUserRequest;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
//use LaravelDaily\Invoices\Classes\InvoiceItem;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        return view('account/index', ['title'=>__('account.Title'),'user' => auth()->user()]);
    }

    public function edit(User $user)
    {
        return view('account/users/edit', compact('user'));
    }

    public function update(UpadateUserRequest $request, User $user)
    {
        if($request->validated()['password'] !=  NULL) {
            $dataValidated = $request->validated();
            $dataValidated['password'] = Hash::make($request->validated()['password']);
        }else{
            $dataValidated = $request->validated();
            unset($dataValidated['password']);
        }

        $user->update($dataValidated);
        return redirect()->back();
    }

    public function orders()
    {
        $orders = Order::with('user')
            ->where('user_id',auth()->user()->id)
            ->paginate(5);

        return view('account/orders/index',compact('orders'));
    }

    public function show(Order $order)
    {
        $products = $order->products()->get();
        return view('account/orders/show', compact('order','products'));
    }
}
