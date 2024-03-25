<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateNewsRequest extends FormRequest
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

    public function messages()
    {
        return array_merge(parent::messages(), [
            'slug' => 'slug',
            'title' => 'Title should be more than 3 symbols',
            'subtitle_1' => 'Dsubtitle_1',
            'subtitle_2' => 'subtitle_2',
            'priority' => 'priority',
            'video_url' => 'video_url',
            'description_top' => 'description_top',
            'description_bottom' => 'description_bottom',

        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $newsId = $this->route('news')->id;
        return [
            'slug' => ['required', 'string', 'min:3', Rule::unique('news','slug')->ignore($newsId)],
            'title' => ['required', 'string'],
            'subtitle_1' => ['nullable'],
            'subtitle_2' => ['nullable'],
            'priority' => ['nullable'],
            'video_url' => ['nullable','string'],
            'description_top' => ['nullable'],
            'description_bottom' => ['nullable'],
            'thumbnail' => ['image:jpeg,png,jpg'],
            'date' => ['nullable', 'date'],
        ];
    }
}
