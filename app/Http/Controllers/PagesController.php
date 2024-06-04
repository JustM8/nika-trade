<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Gallery;
use App\Models\Page;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use mysql_xdevapi\Result;

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
                'data' => $this->getCategoriesWithGalleries()
            ],
            // Додайте інші сторінки тут
        ];


//dd(Gallery::all());

        if (array_key_exists($slug, $pages)) {
            $page = $pages[$slug];
            return view('pages.'.$slug,['title'=>$page['title']],compact('page'));
        } else {
            abort(404);
        }
    }


    public function getCategoriesWithGalleries($id = 0)
    {

        $result = [];
        $categories = Category::with(['galleries' => function ($query) {
            $query->orderBy('date', 'asc'); // Сортує галереї по даті у зростаючому порядку
        }])->get();

        if($id == 0) {

            foreach ($categories as $category) {
                $galleryIds = $category->galleries->pluck('id')->toArray();
                if (!empty($galleryIds)) {
                    $result[] = [
                        'name' => $category->name[App::currentLocale()],
                        'id' => $category->id,
                        'description' => $category->description[App::currentLocale()],
                        'galleries_id' => $galleryIds,
                    ];
                }

            }
            return  $result;
        }else{

            foreach ($categories as $category) {
                if ($category->id == $id) {
                    $galleryIds = $category->galleries->pluck('id')->toArray();

                    $images = [];
                    $rows = [];
                    $result = [
                        'name' => $category->name[App::currentLocale()],
                        'id' => $category->id,
                        'description' => $category->description[App::currentLocale()],
                    ];
                    foreach ($galleryIds as $item) {
                        $gallery = Gallery::findOrFail($item);
                        foreach ($gallery->images as $img) {
                            $images[$gallery->id][] = $img->url;
                        }
                        foreach ($gallery->data[App::currentLocale()] as $key=>$item){
                            $rows['row_'.$key] = '';
                            if($item['row'] != null) {
                                $rows['row_'.$key] = $item['row'];
                            }
                        }

                        $result['galleries'][] =
                            [
                                'data' => $rows,
                                'gallery' => $images[$gallery->id],
                            ];
                    }

                }
            }
            return response()->json($result);
        }

    }

}
