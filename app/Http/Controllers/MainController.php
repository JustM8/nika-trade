<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\MainPage;
use App\Models\Product;
use Illuminate\Support\Facades\App;
use App\Models\News;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $mainPage = MainPage::all();
        $news = News::query()
            ->orderByRaw('ISNULL(priority), priority asc')
            ->orderBy('date', 'desc')
            ->take(3)
            ->get();
        $rootCategories = Category::rootCategories()->get();
//        dd($rootCategories);
        return view('main',['title'=>__('main.page_title')],compact('news', 'rootCategories','mainPage'));
    }
}
