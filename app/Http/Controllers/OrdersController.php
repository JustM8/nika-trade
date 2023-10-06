<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Repositories\Contracts\OrderRepositoryContract;
use App\Repositories\ProductRepository;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Repositories\OrderRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
//        dd($request);
        /*
         companyName: Назва установи:
companyPhone: +111111111111
companyEmail: test@qwe.com
vivyz: Mikhailivka
recipientName:
recipientPhone:
recipientCity:
recipientAddress:
recipientCarrier:
recipientPostalOffice:
recipientNameKyiv:
recipientPhoneKyiv:
recipientAddressKyiv:
comment: iiiooo

         * */
//        dd($request->all(),Cart::instance('cart')->total(2, '.', ''));

//        $user = User::create([
//            'role_id' =>  2,
//            'name' => 'Taylor',
//            'surname' => 'Otwell',
//            'birthdate' => date("2003-01-05"),
//            'phone' => "+380993222112",
//            'email'=> "test@sm.com",
//            'password' => Hash::make('test1234')
//        ]);
//        dd($user);

        try {
            DB::beginTransaction();

            $total = Cart::instance('cart')->total(2, '.', '');
            $request = $request->validated();

            $order = $this->repository->create($request, $total);

            DB::commit();
            if(isset($order->id)){
                $redirectUrl = route('thankYou', ['orderId' => $order->id]);

                // Повертаємо JSON-відповідь разом із URL для переходу
                Cart::instance('cart')->destroy();
                auth()->logout();

                return response()->json([
                    'message' => 'Замовлення успішно створено.',
                    'order' => $order,
                    'redirect_url' => $redirectUrl,
                ]);

//              return  redirect()->route('thankYou',['orderId'=>$order->id]);
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
