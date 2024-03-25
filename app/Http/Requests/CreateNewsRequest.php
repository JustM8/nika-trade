<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateNewsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check() && auth()->user()->is_admin;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string'],
            'slug' => ['required', 'string', 'min:2', 'max:50', 'unique:news'],
//            'row' => ['nullable', 'array'],
//            'description' => ['nullable'],
            'subtitle_1' => ['nullable'],
            'subtitle_2' => ['nullable'],
            'priority' => ['nullable'],
            'video_url' => ['nullable','string'],
            'description_top' => ['nullable'],
            'description_bottom' => ['nullable'],
            'thumbnail' => ['required', 'image:jpeg,png,jpg'],
            'date' => ['nullable', 'date'],
        ];
    }
}
