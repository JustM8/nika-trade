<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Page;
use App\Models\Service;
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
            'services' => [
                'title' => 'Послуги',
                'content' => 'Тут буде контент сторінки "Про компанію"',
                'image' => 'company.jpg',
                'data' => Service::all()
            ],
            'gallery' => [
                'title' => 'Галерея',
                'content' => 'Тут буде контент сторінки "Про компанію"',
                'image' => 'company.jpg',
                'data' => Gallery::all()
            ],
            // Додайте інші сторінки тут
        ];

        if (array_key_exists($slug, $pages)) {
            $page = $pages[$slug];
            return view('pages.'.$slug,['title'=>$page['title']],compact('page'));
        } else {
            abort(404);
        }
    }
}
