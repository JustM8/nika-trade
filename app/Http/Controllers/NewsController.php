<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('news.index',['title'=>__('news.Title')]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($show)
    {
        $news = News::where('slug','=',$show)->first();
//        print_r($news);
        return view('news.show',['title'=>__('Test news.Title')],compact('news'));
    }

}
