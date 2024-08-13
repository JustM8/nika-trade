<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
use App\Models\MainPage;
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

    public function index(Request $request)
    {

    }

    public function create(CreateOrderRequest $request)
    {
        $cartId = $request->session()->get('cart_id');

        try {
            DB::beginTransaction();

            // Отримуємо поточний вміст кошика
            $cartContent = Cart::instance($cartId)->content();

            // Перевірка наявності товарів у кошику
            if ($cartContent->isEmpty()) {
                return response()->json(['error' => 'Кошик порожній.'], 422);
            }

            // Загальна вартість замовлення
            $total = Cart::instance($cartId)->total(2, '.', '');

            // Валідація запиту
            $validatedRequest = $request->validated();

            // Створення замовлення
            $order = $this->repository->create($validatedRequest, $total);

            // Надсилання електронної пошти
            $this->mailSend($order);

            DB::commit();

            // Перевірка, чи замовлення успішно створено
            if (isset($order->id)) {
                $redirectUrl = route('thankYou', ['orderId' => $order->id]);

                // Очищення кошика
                Cart::instance($cartId)->destroy();
                $request->session()->forget('cart_id');

                return response()->json([
                    'message' => 'Замовлення успішно створено.',
                    'order' => $order,
                    'redirect_url' => $redirectUrl,
                ]);
            }

        } catch (\Exception $exception) {
            DB::rollBack();
            logs()->warning($exception->getMessage());
            return response()->json(['error' => $exception->getMessage()], 422);
        }
    }


    public function thankYou(string $orderId)
    {
        $mainPage = MainPage::all();
        // Завантаження замовлення разом з користувачем та продуктами
        $order = Order::with(['products'])->findOrFail($orderId);

        return view('thankyou/summary', ['title' => __('thankyou.page_title')], compact('order', 'mainPage'));
    }


    public function mailSend($order)
    {
        $delivery = [
            1 => 'Самовивіз - Михайлівка-Рубежівка (виробнича база)',
            2 => 'Доставка в офіс м. Київ вул. Новоконстянтинівська, 15/15',
            3 => 'Доставка в офіс м. Дніпро вул. Князя Володимира Великого (кол. Плеханова), 18, 1 поверх',
            4 => 'Доставка перевізником (по Україні)',
            5 => 'Доставка по Києву (послуги вантажників не надаються)',
        ];

        $mail = [
            'Номер замовлення' => $order->id,
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
            'Список товарів в замовленні' => '<hr>',
        ];

        $mail_products = [];
        foreach ($order->products as $product){
            if($product->parent_id != null) {
                $mail_products[] = [
                    "Товар" => $product->title[App::currentLocale()],
                    "Артикул" => $product->SKU,
                    "Кількість" => $product->pivot->quantity,
                    "Ціна товару" => $product->pivot->single_price,
                ];
            }
        }


        $mail = array_merge($mail,$mail_products);


        $message = '<html><body style="font-family: Arial, sans-serif;">';
        $message .= '<h2 style="color: #333;">Нове замовлення:</h2>';

        foreach ($mail as $key => $value) {
            if (is_array($value)) {
                $message .= "<ul>";
                foreach ($value as $innerKey => $innerValue) {
                    $message .= "<li><strong>".$innerKey." : </strong>".$innerValue."</li>";
                }
                $message .= "</ul>";
            } else {
                $message .= "<p><strong>".$key." : </strong>".$value."</p>";
            }
        }

        $message .= "<hr><b>Усього до сплати : ".$order->total." грн.</b>";
        $message .= '</body></html>';

        // Налаштування електронного листа
        //nika@nika-trade.net.ua,
        $to = 'gav.sqrt@gmail.com';
        $subject = 'Замовлення';
        $headers = "From: nika-trade.com.ua\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        $mailSent = mail($to, $subject, $message, $headers);

        return $mailSent;
    }
}
