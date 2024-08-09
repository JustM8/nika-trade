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

        return view('admin/news/index',['title'=>__('news.page_title')],compact('news'));
    }


    public function create()
    {
        return view('admin/news/create',['title'=>__('news.page_title_create')]);
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
        return view('admin/news/edit',['title'=>__('news.page_title_edit')],compact('news'));
    }

    public function update(UpdateNewsRequest $request, News $news)
    {
        if($this->repository->update($news,$request)){
            notify()->success("успішно оновлено","Новину");
            return redirect()->route('admin.news.edit', $news->id);
        }
        notify()->warning("не оновлено","Новину");
        return redirect()->back()->withInput();
    }

    public function destroy(News $news)
    {
        try {
            $news->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Новину успішно видалено'
            ], 200); // 200 OK
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Сталася помилка при видаленні новини'
            ], 500); // 500 Internal Server Error
        }
    }
}
