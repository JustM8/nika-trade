<?php

namespace App\Http\Controllers;

use App\Models\MainPage;
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
        $mainPage = MainPage::all();
        $news = News::query()
            ->orderByRaw('ISNULL(priority), priority asc')
            ->orderBy('date', 'desc')
            ->take(5)
            ->get();
//        $news = News::latest('date')->orderBy('priority')->take(5)->get();
        return view('news.index',['title'=>__('news.Title')], compact('news','mainPage'));
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
        $mainPage = MainPage::all();

        $dataTime = explode(' ',$news->created_at);
        $date = explode('-',$dataTime[0]);

        $news->day = $date[2];
        $news->month = $date[1];
        $news->year = $date[0];

        $otherNews = News::where('id', '!=', $news->id)
            ->latest('date')
            ->take(5)
            ->get();
//        $otherNews = News::all()->except($news->id)->take(2);
        foreach ($otherNews as $item){
            $dataTime = explode(' ',$item->created_at);
            $date = explode('-',$dataTime[0]);
            $item->day = $date[2];
            $item->month = $date[1];
            $item->year = $date[0];
        }
//        dd($otherNews);

        return view('news.show',['title'=>$news->title[App::currentLocale()]],compact('news','otherNews','mainPage'));
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

    public function loadMoreNews(Request $request)
    {
        $offset = $request->input('offset', 0);
        $limit = 5; // Кількість новин, яку потрібно завантажити за раз

        $news = News::latest('date')->skip($offset)->take($limit)->get();
        foreach ($news as $new){
            $d = explode('-',$new->date);
            $n[] = '<div class="news-page-item">'.
                        '<div class="news-page-item-intro-wrap">'.
                            '<div class="news-page-item-intro">'.
                                '<h2 class="news-page-item__title text-24">'.$new->title[App::currentLocale()].'</h2>'.
                                '<p class="news-page-item__text text-14">'.$new->description['description_top'][App::currentLocale()].'</p>'.
                                '<a class="news-page-item__btn btn" href="'.route('news.show', $new->slug).'">Читати новину</a>'.
                            '</div>'.
                            '<div class="news-page-item-date">'.
                                '<span class="news-page-item-date__day text-14">'.$d[2].'</span>'.
                                '<span class="news-page-item-date__month text-14">'.$d[1].'</span>'.
                                '<span class="news-page-item-date__year text-14">'.$d[0].'</span>'.
                            '</div>'.
                        '</div>'.
                        '<div class="news-page-item__img-wrap">'.
                            '<img class="news-page-item__img" src="'.$new->thumbnailUrl.'" alt="">'.
                        '</div>'.
                    '</div>';
        }

        return $n;
    }

}
