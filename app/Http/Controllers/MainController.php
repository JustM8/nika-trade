<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\App;
use App\Models\News;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $news = News::query()
            ->orderByRaw('ISNULL(priority), priority asc')
            ->orderBy('date', 'desc')
            ->take(3)
            ->get();
        $rootCategories = Category::rootCategories()->get();
//        dd($rootCategories);
        return view('main',['title'=>__('main.Main')],compact('news', 'rootCategories'));
    }
}
