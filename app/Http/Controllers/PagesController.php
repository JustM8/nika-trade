<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function show($slug)
    {
        $pages = [
            'contacts' => [
                'title' => 'Контакти',
                'content' => 'Тут буде контент сторінки "Контакти"',
                'image' => 'contacts.jpg',
            ],
            'about-company' => [
                'title' => 'Про компанію',
                'content' => 'Тут буде контент сторінки "Про компанію"',
                'image' => 'company.jpg',
            ],
            'services' => [
                'title' => 'Про компанію',
                'content' => 'Тут буде контент сторінки "Про компанію"',
                'image' => 'company.jpg',
            ],
            'gallery' => [
                'title' => 'Про компанію',
                'content' => 'Тут буде контент сторінки "Про компанію"',
                'image' => 'company.jpg',
            ],
            // Додайте інші сторінки тут
        ];

        if (array_key_exists($slug, $pages)) {
            $page = $pages[$slug];
            return view('pages.'.$slug,compact('page'));
        } else {
            abort(404);
        }
    }
}
