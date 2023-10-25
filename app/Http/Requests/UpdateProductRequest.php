<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
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
            'title' => 'Title should be more than 3 symbols',
            'description' => 'Description should be more than 10 symbols',

        ]);
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $productId = $this->route('product')->id;

        return [
            'title' => ['required', 'string', 'min:3', Rule::unique('products','title')->ignore($productId)],
            'description' => ['required', 'string', 'min:10'],
            'slug' => ['required', 'string',Rule::unique('products','slug')->ignore($productId)],
            'SKU' => ['required', 'string', 'min:1', 'max:35', Rule::unique('products','SKU')->ignore($productId)],
            'price' => ['required', 'numeric', 'min:1'],
            'discount' => ['required', 'numeric', 'min:0', 'max:99'],
            'in_stock' => ['required', 'numeric', 'min:0'],
            'category_id' => ['required', 'numeric'],
            'parent_id' => ['nullable'],
            'thumbnail' => ['nullable', 'image:jpeg,png,jpg'],
            'obj_model' => ['nullable', 'file'],
            'pdf' => ['nullable', 'mimes:pdf'],
            'images.*' => ['image:jpeg,png,jpg'],
            'recommended_id' => ['nullable'],
        ];
    }
}
