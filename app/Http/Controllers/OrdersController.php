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
use Illuminate\Support\Facades\App;
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


        try {
            DB::beginTransaction();

            $total = Cart::instance('cart')->total(2, '.', '');
            $request = $request->validated();

            $order = $this->repository->create($request, $total);


            $delivery = [
                1 => 'Самовивіз - Михайлівка-Рубежівка (виробнича база)',
                2 => 'Доставка в офіс м. Київ вул. Новоконстянтинівська, 15/15',
                3 => 'Доставка в офіс м. Дніпро вул. Князя Володимира Великого (кол. Плеханова), 18, 1 поверх',
                4 => 'Доставка перевізником (по Україні)',
                5 => 'Доставка по Києву (послуги вантажників не надаються)',
            ];

            $mail = [
                'Замовник' => $order->company_name,
                'Контактний телефон' => $order->phone,
                'Email' => $order->email,
                'Тип доставки' => $delivery[$order->delivery_type],

                'Отримувач' => $order->name,
                'Телефон отримувача' => $order->phone_delivery,
                'Місто' => $order->city,
                'Адреса' => $order->address,
                'Перевізник' => $order->delivery_info['carrier'],
                'Номер відділення' => $order->delivery_info['branch_number'],

                'Коментар' => $order->comment,
                'Бажаний колір обладнання' => $order->comment_color,


            ];

            $mail_products = [];
            foreach ($order->products as $product){
                $mail_products[] = [
                    'Товар' => $product->title[App::currentLocale()],
                    'Артикул' => $product->SKU,
                    'Ціна товару' => $product->pivot->single_price,
                ];

            }
            $mail = array_merge($mail,$mail_products);

            //  'Номер замовлення' => $order->id,
            //                'Усього до сплати' => $order->total,

            $message = "Добрий день,\n\nВаше замовлення:\n\n";
            foreach ($mail as $key => $value) {
                if (is_array($value)) {
                    foreach ($value as $innerKey => $innerValue) {
                        $message .= "$innerKey: $innerValue\n";
                    }
                } else {
                    $message .= "$key: $value\n";
                }
            }

// Налаштування електронного листа
            $to = 'gav.sqrt@gmail.com';
            $subject = 'Замовлення';
            $headers = 'From: nika-trade.com.ua' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

// Відправка електронного листа
            $mailSent = mail($to, $subject, $message, $headers);


            DB::commit();
            if(isset($order->id)){
                $redirectUrl = route('thankYou', ['orderId' => $order->id]);

                // Повертаємо JSON-відповідь разом із URL для переходу
                Cart::instance('cart')->destroy();
//                auth()->logout();

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

        return view('thankyou/summary',['title'=>__('thankyou.Title')], compact('order'));
    }
}
