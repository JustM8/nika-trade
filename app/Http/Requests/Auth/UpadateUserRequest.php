<?php

namespace App\Http\Requests\Auth;

use App\Rules\Phone;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UpadateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $userId = $this->route('user')->id;

        return [
            'name' => ['required', 'min:2', 'max:35'],
            'surname' => ['required', 'min:2', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:255',  Rule::unique('users', 'email')->ignore($userId)],
            'phone' => ['required', 'string', 'max:15', new Phone,Rule::unique('users', 'phone')->ignore($userId)],
            'birthdate' => ['required', 'date', 'before_or_equal:-18 years'],
            'password' => ['nullable','confirmed', Password::default()]

        ];
    }
}
