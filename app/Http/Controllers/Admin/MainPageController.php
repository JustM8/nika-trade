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
        return view('admin/main/index',['title'=>__('mainPage.Title')], compact('mainPage'));
    }

    public function create()
    {
        return view('admin/main/create',['title'=>__('mainPage.Title')]);
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
        return view('admin/main/edit',['title'=>__('service.Title')], compact('mainPage'));
    }

    public function update(UpdateMainPageRequest $request, MainPage $mainPage)
    {
        if($this->repository->update($mainPage,$request)){
            return redirect()->route('admin.main.index');
        }
        return redirect()->back()->withInput();
    }

    public function destroy(MainPage $mainPage)
    {
        $mainPage->delete();
        return redirect()->back();
    }
}
