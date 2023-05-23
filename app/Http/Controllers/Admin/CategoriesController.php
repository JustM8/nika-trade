<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Facades\App;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('products')->paginate(5);

        return view('admin/categories/index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin/categories/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateCategoryRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateCategoryRequest $request)
    {
        $locale = App::currentLocale();
        $data = [
            'name' => [$locale=> $request->name],
            'slug' => $request->slug,
        ];

        if(Category::create($data)){
            return redirect()->route('admin.categories.index');
        }else{
            return redirect()->back()->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Category $category)
    {
        $parents = Category::all()->except($category->id); //update
        return view('admin/categories/edit', compact('category','parents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCategoryRequest $request
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $locale = App::currentLocale();
        $langs = config('app.available_locales');

        foreach ($langs as $lang){
            if($lang == $locale) {
                $nameContent[$lang] = $request->name;
            }else{
                if(!empty($category->name[$lang])) {
                    $nameContent[$lang] = $category->name[$lang];
                }else{
                    $nameContent[$lang] = '';
                }
            }
        }

        $data = [
            'slug'=>$request->slug,
            'name' => $nameContent
        ];

        if($category->update($data)){
            return redirect()->route('admin.categories.index');
        }
        return redirect()->back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back();
    }
}
