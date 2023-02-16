<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateNewRequest;
use App\Http\Requests\UpdateNewRequest;
use App\Models\News;
use Illuminate\Support\Facades\App;

class NewsController extends Controller
{


    public function index()
    {
        $news = News::all();
        return view('admin/news/index',compact('news'));
    }


    public function create()
    {
        return view('admin/news/create');
    }

    public function store(CreateNewRequest $request)
    {
        $locale = App::currentLocale();
        $data = [
            'slug' => $request->slug,
            'title' => [$locale,'qwe'],
            'description' => [$locale=>$request->row,'count'=>count($request->row)],
            'thumbnail' => 'img.png'
        ];

        if(News::create($data)){
            return redirect()->route('admin.news.index');
        }else{
            return redirect()->back()->withInput();
        }

    }

    public function edit(News $news)
    {
        return view('admin/news/edit',compact('news'));
    }

    public function update(UpdateNewRequest $request, News $news)
    {
        $locale = App::currentLocale();
        $langs = config('app.available_locales');

        foreach ($langs as $lang){
            if ($lang == $locale){
                $dataContent[$lang] = $request->row;
            }else{
                $dataContent[$lang] = $news->content[$lang];
            }
            $count = count($dataContent[$lang]);
        }

        $data = [
            'slug'=>$request->slug,
            'content' => array_merge($dataContent,['count'=>$count])
        ];

        if($news->update($data)){
            return redirect()->route('admin.news.index');
        }
        return redirect()->back()->withInput();
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('admin.news.index');
    }
}
