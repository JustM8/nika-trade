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
        $news = News::all();
        return view('news.index',['title'=>__('news.Title')], compact('news'));
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
        $dataTime = explode(' ',$news->created_at);
        $date = explode('-',$dataTime[0]);
        $month = $this->monthName($date[1]);
//        print_r($news);
        return view('news.show',['title'=>__('Test news.Title')],compact('news','month','date'));
    }

    public function monthName($month):string
    {
        $monthList = [
            '01' => __('Січень'),
            '02' => __('Лютий'),
            '03' => __('Березень'),
            '04' => __('Квітень'),
            '05' => __('Травень'),
            '06' => __('Червень'),
            '07' => __('Липень'),
            '08' => __('Серпень'),
            '09' => __('Вересень'),
            '10' => __('Жовтень'),
            '11' => __('Листопад'),
            '12' => __('Грудень'),
        ];

        return $monthList[$month];
    }

}
