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

//                $data = [];
                    $images = [];
                    foreach ($galleryIds as $item) {
                        $gallery = Gallery::findOrFail($item);
                        foreach ($gallery->images as $img) {
                            $images[$gallery->id][] = $img->url;
                        }

                        $result[$gallery->id] =
                            [
                                'data' => [
                                    'row_0' => $gallery->data[App::currentLocale()][0]['row'],
                                    'row_1' => $gallery->data[App::currentLocale()][1]['row'],
                                    'row_2' => $gallery->data[App::currentLocale()][2]['row'],
                                    'row_3' => $gallery->data[App::currentLocale()][3]['row'],
                                    'row_4' => $gallery->data[App::currentLocale()][4]['row'],
                                ],
                                'gallery' => $images[$gallery->id],
                                'thumbnail' => $gallery->thumbnailUrl,
                                'name' => $category->name[App::currentLocale()],
                                'id' => $category->id,
                                'description' => $category->description[App::currentLocale()],
                            ];
                    }

//                if (!empty($galleryIds)) {
////                    $result[] = [
////                        'name' => $category->name[App::currentLocale()],
////                        'id' => $category->id,
////                        'description' => $category->description[App::currentLocale()],
////                        'galleries_id' => $galleryIds,
////                        'gallery' => $data
////                    ];
//                    $result[] =  $data;
//                }

                }
            }
            return response()->json($result);
        }

    }

}
