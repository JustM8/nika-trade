<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\App;

class UpdateServiceRequest extends FormRequest
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
        $locale = App::getLocale(); // Get the current locale
         // Define your default messages here
            $messages = [
                'validation.required' => 'The field is required.',
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
            ];

            // Modify the messages based on the locale
            if ($locale === 'ua') {
                $messages = array_merge($messages, [
                    'validation.required' => 'Поле є обов\'язковим.',
                    'title.required' => 'Поле "Заголовок" є обов\'язковим.',
                    'title.string' => 'Заголовок має бути рядком.',
                    'title.min' => 'Заголовок має містити більше ніж 3 символи.',
                    'title.unique' => 'Заголовок вже використовується.',

                    'description.nullable' => 'Опис може бути або пустим, або дійсним рядком.',

                    'slug.required' => 'Поле "Назва" є обов\'язковим.',
                    'slug.string' => 'Назва має бути рядком.',

                    'SKU.required' => 'Поле "Код/Артикль" є обов\'язковим.',
                    'SKU.string' => 'Код/Артикль має бути рядком.',
                    'SKU.min' => 'Код/Артикль має містити хоча б 1 символ.',
                    'SKU.max' => 'Код/Артикль не може бути довшим ніж 35 символів.',
                    'SKU.unique' => 'Код/Артикль вже використовується.',

                    'price.required' => 'Поле "Ціна" є обов\'язковим.',
                    'price.numeric' => 'Ціна має бути числом.',
                    'price.min' => 'Ціна має бути не менше ніж 1.',

                    'discount.required' => 'Поле "Знижка" є обов\'язковим.',
                    'discount.numeric' => 'Знижка має бути числом.',
                    'discount.min' => 'Знижка має бути не менше ніж 0.',
                    'discount.max' => 'Знижка не може перевищувати 99.',

                    'in_stock.required' => 'Поле "В наявності" є обов\'язковим.',
                    'in_stock.numeric' => 'Кількість на складі має бути числом.',
                    'in_stock.min' => 'Кількість на складі має бути не менше ніж 0.',

                    'category.required' => 'Поле "Категорія" є обов\'язковим.',
                    'category.array' => 'Категорія має бути масивом.',

                    'parent_id.nullable' => 'Батьківське ID може бути пустим або дійсним значенням.',

                    'thumbnail.required' => 'Поле "Зображення" є обов\'язковим.',
                    'thumbnail.image' => 'Зображення має бути формату: jpeg, png, jpg.',

                    'obj_model.file' => 'Модель obj має бути дійсним файлом.',

                    'pdf.mimes' => 'PDF має бути файлом формату: pdf.',

                    'images.*.image' => 'Зображення має бути формату: jpeg, png, jpg.',

                    'recommended_id.nullable' => 'Рекомендовані ID можуть бути пустим або дійсним значенням.',
                ]);
            }

            if ($locale === 'ru') {
                $messages = array_merge($messages, [
                    'validation.required' => 'Поле обязательно для заполнения.',
                    'title.required' => 'Поле "Заголовок" обязательно для заполнения.',
                    'title.string' => 'Заголовок должно быть строкой.',
                    'title.min' => 'Заголовок должно содержать более 3 символов.',
                    'title.unique' => 'Заголовок уже занято.',

                    'description.nullable' => 'Описание может быть пустым или допустимой строкой.',

                    'slug.required' => 'Поле "Название" обязательно для заполнения.',
                    'slug.string' => 'Название должен быть строкой.',

                    'SKU.required' => 'Поле "Код/Артикль" обязательно для заполнения.',
                    'SKU.string' => 'Код/Артикль должно быть строкой.',
                    'SKU.min' => 'Код/Артикль должно содержать хотя бы 1 символ.',
                    'SKU.max' => 'Код/Артикль не может превышать 35 символов.',
                    'SKU.unique' => 'Код/Артикль уже занято.',

                    'price.required' => 'Поле "Цена" обязательно для заполнения.',
                    'price.numeric' => 'Цена должна быть числом.',
                    'price.min' => 'Цена должна быть не менее 1.',

                    'discount.required' => 'Поле "Скидка" обязательно для заполнения.',
                    'discount.numeric' => 'Скидка должна быть числом.',
                    'discount.min' => 'Скидка должна быть не менее 0.',
                    'discount.max' => 'Скидка не может превышать 99.',

                    'in_stock.required' => 'Поле "В наличии" обязательно для заполнения.',
                    'in_stock.numeric' => 'Количество в наличии должно быть числом.',
                    'in_stock.min' => 'Количество в наличии должно быть не менее 0.',

                    'category.required' => 'Поле "Категория" обязательно для заполнения.',
                    'category.array' => 'Категория должна быть массивом.',

                    'parent_id.nullable' => 'ID родителя может быть пустым или допустимым значением.',

                    'thumbnail.required' => 'Поле "Изображение" обязательно для заполнения.',
                    'thumbnail.image' => 'Изображение должен быть формата: jpeg, png, jpg.',

                    'obj_model.file' => 'Модель obj должна быть допустимым файлом.',

                    'pdf.mimes' => 'PDF должен быть файлом формата: pdf.',

                    'images.*.image' => 'Изображения должны быть формата: jpeg, png, jpg.',

                    'recommended_id.nullable' => 'ID рекомендации может быть пустым или допустимым значением.',
                ]);
            }

            // Add more locale checks and messages as needed

            return array_merge(parent::messages(), $messages);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'data' => ['nullable'],
            'thumbnail' => ['image:jpeg,png,jpg'],
        ];
    }
}
