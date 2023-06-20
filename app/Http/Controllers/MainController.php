<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $news = News::all()->sortBy('priority')->take(3);
        return view('main',['title'=>__('main.Main')],compact('news'));
    }
}
