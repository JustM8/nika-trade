<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check() &&  auth()->user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $categoryId = $this->route('category')->id;

        return [
            'name' => ['required', 'string'],
            'slug' => ['required', 'string', 'min:2', 'max:50', Rule::unique('categories', 'slug')->ignore($categoryId)],
            'parent_id' => ['nullable'],
            'post_title' => ['nullable'],
            'description' => ['nullable'],
            'description_l' => ['nullable'],
            'description_r' => ['nullable'],
            'thumbnail' => ['nullable','image:jpeg,png,jpg'],
        ];
    }
}
