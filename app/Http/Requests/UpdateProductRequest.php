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
            'title.required' => 'The title field is required.',
            'title.string' => 'The title must be a string.',
            'title.min' => 'The title must be more than 3 symbols.',
            'title.unique' => 'The title has already been taken.',

            'description.nullable' => 'The description must be null or a valid string.',

            'slug.required' => 'The slug field is required.',
            'slug.string' => 'The slug must be a string.',

            'SKU.required' => 'The SKU field is required.',
            'SKU.string' => 'The SKU must be a string.',
            'SKU.min' => 'The SKU must be at least 1 character.',
            'SKU.max' => 'The SKU may not be greater than 35 characters.',
            'SKU.unique' => 'The SKU has already been taken.',

            'price.required' => 'The price field is required.',
            'price.numeric' => 'The price must be a numeric value.',
            'price.min' => 'The price must be at least 1.',

            'discount.required' => 'The discount field is required.',
            'discount.numeric' => 'The discount must be a numeric value.',
            'discount.min' => 'The discount must be at least 0.',
            'discount.max' => 'The discount may not be greater than 99.',

            'in_stock.required' => 'The in stock field is required.',
            'in_stock.numeric' => 'The in stock must be a numeric value.',
            'in_stock.min' => 'The in stock must be at least 0.',

            'category.required' => 'The category field is required.',
            'category.array' => 'The category must be an array.',

            'parent_id.nullable' => 'The parent ID must be null or a valid value.',

            'thumbnail.required' => 'The thumbnail field is required.',
            'thumbnail.image' => 'The thumbnail must be an image of type: jpeg, png, jpg.',

            'obj_model.file' => 'The obj model must be a valid file.',

            'pdf.mimes' => 'The PDF must be a file of type: pdf.',

            'images.*.image' => 'The images must be an image of type: jpeg, png, jpg.',

            'recommended_id.nullable' => 'The recommended ID must be null or a valid value.',

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
            'description' => ['nullable'],
            'slug' => ['required', 'string',Rule::unique('products','slug')->ignore($productId)],
            'SKU' => ['required', 'string', 'min:1', 'max:35', Rule::unique('products','SKU')->ignore($productId)],
            'price' => ['required', 'numeric', 'min:1'],
            'discount' => ['required', 'numeric', 'min:0', 'max:99'],
            'in_stock' => ['required', 'numeric', 'min:0'],
            'category' => ['required', 'array'],
            'parent_id' => ['nullable'],
            'thumbnail' => ['nullable', 'image:jpeg,png,jpg'],
            'obj_model' => ['nullable', 'file'],
            'pdf' => ['nullable', 'mimes:pdf'],
            'images.*' => ['image:jpeg,png,jpg'],
            'recommended_id' => ['nullable'],
            'is_public' => ['nullable'],
            'priority' => ['nullable'],
        ];
    }
}
