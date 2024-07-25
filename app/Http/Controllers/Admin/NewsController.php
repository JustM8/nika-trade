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
        $news = News::query()
            ->orderByRaw('ISNULL(priority), priority asc')
            ->orderBy('date', 'desc')
            ->get();
        return view('admin/news/index',['title'=>__('news.Title')],compact('news'));
    }


    public function create()
    {
        return view('admin/news/create',['title'=>__('news.Title')]);
    }

    public function store(CreateNewsRequest $request)
    {
        if($this->repository->create($request)){
            notify()->success("успішно створено","Новину");
            return redirect()->route('admin.news.index');
        }else{
            return redirect()->back()->withInput();
        }
    }

    public function edit(News $news)
    {
        return view('admin/news/edit',['title'=>__('news.Title')],compact('news'));
    }

    public function update(UpdateNewsRequest $request, News $news)
    {
        if($this->repository->update($news,$request)){
            notify()->success("успішно оновлено","Новину");
            return redirect()->route('admin.news.index');
        }
        notify()->warning("не оновлено","Новину");
        return redirect()->back()->withInput();
    }

    public function destroy(News $news)
    {
        $news->delete();
        notify()->success("успішно видалено","Новину");
        return redirect()->route('admin.news.index');
    }
}
