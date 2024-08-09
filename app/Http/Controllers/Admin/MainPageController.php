<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateMainPageRequest;
use App\Http\Requests\UpdateMainPageRequest;
use App\Models\MainPage;
use App\Repositories\MainPageRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class MainPageController extends Controller
{
    public function __construct(protected MainPageRepository $repository)
    {

    }

    public function index()
    {
        $mainPage = MainPage::all();
        return view('admin/main/index',['title'=>__('mainPage.page_title')], compact('mainPage'));
    }

    public function create()
    {
        return view('admin/main/create',['title'=>__('mainPage.page_title_create')]);
    }

    public function store(CreateMainPageRequest $request)
    {
        if($this->repository->create($request)){
            return redirect()->route('admin.main.index');
        }else{
            return redirect()->back()->withInput();
        }
    }

    public function edit(MainPage $mainPage)
    {
//        dd($mainPage->images);
        return view('admin/main/edit',['title'=>__('service.page_title_edit')], compact('mainPage'));
    }

    public function update(UpdateMainPageRequest $request, MainPage $mainPage)
    {
        if($this->repository->update($mainPage,$request)){
            notify()->success("успішно оновлено","Контакти");
            return redirect()->route('admin.main.index');
        }
        notify()->warning("не оновлено","Контакти");
        return redirect()->back()->withInput();
    }

    public function destroy(MainPage $mainPage)
    {
        $mainPage->delete();
        return redirect()->back();
    }
}
