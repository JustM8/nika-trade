<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->isAdmin();
    }


    public function messages()
    {
        return array_merge(parent::messages(), [
            'title:min' => 'Title should be more than 3 symbols',
        ]);
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string', 'min:3', 'unique:products'],
            'description' => ['required', 'string', 'min:10'],
            'slug' => ['required', 'string'],
            'SKU' => ['required', 'string', 'min:1', 'max:35', 'unique:products'],
            'price' => ['required', 'numeric', 'min:1'],
            'discount' => ['required', 'numeric', 'min:0', 'max:99'],
            'in_stock' => ['required', 'numeric', 'min:0'],
            'category' => ['required', 'numeric'],
            'thumbnail' => ['required', 'image:jpeg,png,jpg'],
            'obj_model' => [ 'file'],
            'pdf' => [ 'mimes:pdf'],
            'images.*' => ['image:jpeg,png,jpg'],
            'recommended_id' => ['nullable'],
        ];
    }
}
