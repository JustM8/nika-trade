<?php

namespace App\Http\Requests;

use App\Rules\Phone;
use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return auth()->check();
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'company_name' => ['required', 'string', 'min:2', 'max: 35'],
            'phone' => ['required', 'string'],
            'email' => ['required', 'email'],
            'delivery_type' => [ 'int'],

            'name' => ['nullable', 'string', 'min:2', 'max: 35'],
            'phone_delivery' => ['nullable', 'string'],
            'city' => ['nullable', 'string', 'min:2', 'max:50'],
            'address' => ['nullable', 'string', 'min:2', 'max:50'],
            'delivery_info' => [
                'nullable',
                'array', // Перевірка, що 'delivery_info' є масивом
                'min:1', // Мінімум один елемент у масиві
                'max:2', // Максимум два елементи у масиві
            ],
            'delivery_info.carrier' => ['nullable', 'string'],
            'delivery_info.branch_number' => ['nullable', 'string'],

            'nameKyiv' => ['nullable', 'string', 'min:2', 'max: 35'],
            'phoneKyiv' => ['nullable', 'string'],
            'addressKyiv' => ['nullable', 'string', 'min:2', 'max:50'],




            'comment' => ['nullable','string'],


        ];
    }
}
