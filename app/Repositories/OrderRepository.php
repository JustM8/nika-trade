<?php

namespace App\Repositories;

use App\Helpers\Adapters\TransactionAdapter;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\User;
use App\Repositories\Contracts\OrderRepositoryContract;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


class OrderRepository implements OrderRepositoryContract
{
    const ORDER_STATUSES = [
        'completed' => 'COMPLETED'
    ];

    public function create(array $request, float $total): Order|bool
    {

//        $user = User::where('email', $request['email'])
//            ->orWhere('phone', $request['phone'])
//            ->first();
       $request['phone'] = $this->cleanPhoneNumber($request['phone']);
       if($request['delivery_type'] != 5){
                unset($request['nameKyiv'],$request['phoneKyiv'],$request['addressKyiv']);
        }else{
           $request['name'] = $request['nameKyiv'];
           $request['phone_delivery'] = $request['phoneKyiv'];
           $request['address'] = $request['addressKyiv'];
           unset($request['nameKyiv'],$request['phoneKyiv'],$request['addressKyiv']);
       }

//        if (!$user) {
//            $user = new User();
//                $user->role_id = 2;
//                $user->name = 'Клієнт з компанії - '.$request['company_name'];
//                $user->surname = ' ';
//                $user->birthdate = date("2003-01-05");
//                $user->phone = $request['phone'];
//                $user->email = $request['email'];
//                $user->password =  Hash::make($request['phone']);
//            $user->save();
//        }
//        auth()->login($user);

        $status = OrderStatus::defaultStatus()->first();

        $request = array_merge($request, [
            'status_id' => $status->id,
            'total' => $total
        ]);

//        $order = $user->orders()->create($request);
        $order = Order::create($request);

        $this->addProductsToOrder($order);

        return  $order;
    }

//    public function setTransaction(string $vendorOrderId, TransactionAdapter $adapter): Order
//    {
//        $order = Order::where('vendor_order_id', $vendorOrderId)->firstOrFail();
//        $transaction = $order->transaction()->create((array) $adapter);
//
//        if($adapter->status === self::ORDER_STATUSES['completed']){
//            $order->update([
//                'status_id' => OrderStatus::paidStatus()->firstOrFail()?->id,
//                'transaction_id' => $transaction->id
//            ]);
//        }
//
//        return $order;
//    }

    protected function addProductsToOrder(Order $order)
    {
        $request = request();
        $cartId = $request->cookie('cart_id');
        Cart::instance($cartId)->content()->groupBy('id')->each( function ($item) use ($order){
            $cartItem  = $item->first();
//            dd($cartItem);
            $order->products()->attach(
                $cartItem->model,//product if ->model
                [
                    'quantity' => $cartItem->qty,
                    'single_price' => $cartItem->model->endPrice
                ]
            );
            //коментуємо обробку кількості товарів і видалення кількості замовленого (товари виробляються під ключ)
//            $inStock = $cartItem->model->in_stock - $cartItem->qty;
//
//            if(!$cartItem->model->update(['in_stock' => $inStock])){
//                throw new \Exception("Smth went wrong with product (id={$cartItem->model->id}) in_stock update");
//            }

        });
    }
    public function cleanPhoneNumber($phoneNumber) {
        $cleanedNumber = preg_replace('/\D/', '', $phoneNumber);
        return $cleanedNumber;
    }
}
