<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Models\News;
use App\Repositories\NewsRepository;
use Illuminate\Support\Facades\App;

class NewsController extends Controller
{

    public function __construct(protected NewsRepository $repository)
    {
    }
    public function index()
    {
        $news = News::all();
        return view('admin/news/index',compact('news'));
    }


    public function create()
    {
        return view('admin/news/create');
    }

    public function store(CreateNewsRequest $request)
    {
        dd($request);
        if($this->repository->create($request)){
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
//dd($request,$news->description);
        foreach ($langs as $lang){
            if ($lang == $locale){
                $dataContent[$lang] = $request->row;
            }else{
                if(!empty($news->description[$lang])) {
                    $dataContent[$lang] = $news->description[$lang];
                }
            }
            if(!empty( $dataContent[$lang])) {
                $count = count($dataContent[$lang]);
            }
        }

        $data = [
            'slug'=>$request->slug,
            'description' => array_merge($dataContent,['count'=>$count])
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
