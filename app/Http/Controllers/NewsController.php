<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\App;

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

        $news->day = $date[2];
        $news->month = $this->monthName($date[1]);
        $news->year = $date[0];

        $otherNews = News::all()->except($news->id)->take(2);
        foreach ($otherNews as $item){
            $dataTime = explode(' ',$item->created_at);
            $date = explode('-',$dataTime[0]);
            $item->day = $date[2];
            $item->month = $this->monthName($date[1]);
            $item->year = $date[0];
        }
//        dd($otherNews);

        return view('news.show',['title'=>$news->title[App::currentLocale()]],compact('news','otherNews'));
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
