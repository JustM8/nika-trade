<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FormController extends Controller
{
    public function send(Request $request)
    {
        // Валідація вхідних даних
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|phone|max:255',
        ]);

        $recipients = [
            'gav.sqrt@gmail.com',
            'imsashasho@gmail.com'
        ];
        $to = implode(', ', $recipients);
        $message = "Ім'я: {$request->name}<br>Телефон: {$request->phone}<br>";

        $subject = 'Замовлення дзвінка';
        $headers = "From: nika-trade.com.ua\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        try {
            $mailSent = mail($to, $subject, $message, $headers);

            if (!$mailSent) {
                throw new \Exception('Не вдалося відправити повідомлення.');
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Повідомлення відправлено'
            ], 200);
        } catch (\Exception $e) {
            Log::error('Помилка при відправці пошти: ' . $e->getMessage());

            return response()->json([
                'status' => 'error',
                'message' => 'Сталася помилка при відправленні повідомлення'
            ], 500);
        }
    }
}
