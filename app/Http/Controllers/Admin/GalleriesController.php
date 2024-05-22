<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateGalleryRequest;
use App\Http\Requests\UpdateGalleryRequest;
use App\Models\Category;
use App\Models\Gallery;
use App\Repositories\GalleryRepository;

class GalleriesController extends Controller
{
    public function __construct(protected GalleryRepository $repository)
    {
    }

    public function index()
    {
        $galleries = Gallery::all();
        return view('admin/galleries/index',['title'=>__('gallery.Title')],compact('galleries'));
    }

    public function create()
    {
        $categories = Category::nonRootCategories()->get();
        return view('admin/galleries/create',['title'=>__('gallery.Title')],compact('categories'));
    }

    public function store(CreateGalleryRequest $request)
    {
        if($this->repository->create($request)){
            return redirect()->route('admin.galleries.index');
        }else{
            return redirect()->back()->withInput();
        }
    }

    public function edit(Gallery $gallery)
    {
        $categories = Category::whereNotNull('parent_id')->get();
        return view('admin/galleries/edit',['title'=>__('gallery.Title')], compact('gallery','categories'));
    }

    public function update(UpdateGalleryRequest $request, Gallery $gallery)
    {
        if($this->repository->update($gallery,$request)){
            return redirect()->route('admin.galleries.index');
        }
        return redirect()->back()->withInput();
    }

    public function destroy(Gallery $gallery)
    {
        $gallery->delete();
        return redirect()->back();
    }
}
