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
            'name' => ['required', 'string', 'min:2', 'max: 35'],
            'company_name' => ['required', 'string', 'min:2', 'max: 35'],
            'phone' => ['required', 'string'],
            'phone_delivery' => ['required', 'string'],
            'email' => ['required', 'email'],
            'city' => ['required', 'string', 'min:2', 'max:50'],
            'address' => ['required', 'string', 'min:2', 'max:50'],
            'comment' => ['nullable','string'],
            'delivery_type' => [ 'int'],
            'delivery_info' => [ 'text'],
        ];
    }
}
