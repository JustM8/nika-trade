<?php

namespace App\Repositories;

use App\Helpers\Adapters\TransactionAdapter;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\Product;
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


    protected function addProductsToOrder(Order $order)
    {
        $request = request();
        $cartId = $request->session()->get('cart_id');

        // Перевірка наявності cart_id в сесії
        if (!$cartId) {
            // Логування або помилка
            logs()->warning('Cart ID is not set in session.');
            return;
        }

        $cartContent = Cart::instance($cartId)->content();

        // Перевірка, чи кошик не порожній
        if ($cartContent->isEmpty()) {
            // Логування або помилка
            logs()->warning('Cart is empty.');
            return;
        }

        $cartContent->groupBy('id')->each(function ($item) use ($order) {
            $cartItem = $item->first();

            // Перевірка наявності моделі товару
            if (!$cartItem->model) {
                // Логування або помилка
                logs()->warning("Cart item does not have an associated model. Item ID: {$cartItem->id}");
                return;
            }

            // Перевірка наявності товару в базі даних
            $product = Product::find($cartItem->model->id);

            if (!$product) {
                // Логування або помилка
                logs()->warning("Product not found in the database. Product ID: {$cartItem->model->id}");
                return;
            }

            $order->products()->attach(
                $product, // продукт
                [
                    'quantity' => $cartItem->qty,
                    'single_price' => $product->endPrice
                ]
            );
        });

        // Очищення кошика після успішного додавання товарів
        Cart::instance($cartId)->destroy();

        // Видалення cart_id з сесії
        $request->session()->forget('cart_id');
    }

    public function cleanPhoneNumber($phoneNumber) {
        $cleanedNumber = preg_replace('/\D/', '', $phoneNumber);
        return $cleanedNumber;
    }
}
