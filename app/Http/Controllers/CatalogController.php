<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\MainPage;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class CatalogController extends Controller
{

    public function index()
    {
        $rootCategories = Category::rootCategories()->get();
        return view('catalog.index',['title'=>__('catalog.page_title')], compact('rootCategories'));
    }

    public function show($slug)
    {
        $mainPage = MainPage::all();
        $category = Category::where('slug','=',$slug)->first();
        $childrens = $this->getChildCategories($category->id);
        $childrensOfChildrens = [];
        $products = collect();

        foreach ($childrens as $children)
        {
            $childrensOfChildrens[$children->id] = $this->getChildCategories($children->id);
        }

        if($category->hasProducts() == true)
        {
//            $products = $category->products;

            $products = $category->products()
                ->whereNull('parent_id')
                ->where('is_public', 1)
                ->orderBy('priority', 'asc')
                ->get();
//            dd($products);
            if($products->isEmpty()){
                $products = $products->collect();
            }
        }

        $category = Category::find($category->id);

        if (!$category) {
            return response()->json(['message' => 'Категорія не знайдена'], 404);
        }
        $rootParent = $category->findRootParent();


        $menu = $this->getMenu();

        $breadcrumbs = $category->breadcrumbs;
        Session::put('current_category_slug', $category->slug);
        Session::put('current_category_id', $category->id);


        return view('catalog.show',['title'=>__('catalog.page_title').' - '.$category->name[App::currentLocale()]], compact('category','childrens','childrensOfChildrens','menu','products','rootParent','breadcrumbs','mainPage'));
    }

    public function getChildCategories($parentId)
    {
        // Знайти батьківську категорію за її ID
        $parentCategory = Category::find($parentId);

        if (!$parentCategory) {
            // Обробка ситуації, коли батьківська категорія не знайдена
            return response()->json(['message' => 'Батьківська категорія не знайдена'], 404);
        }
        // Викликати метод children() для отримання всіх дочірніх категорій
        $childCategories = $parentCategory->children;

        return $childCategories;
    }

    public function getMenu()
    {
        // Отримати всі кореневі категорії
        $rootCategories = Category::rootCategories()->get();

        $menu = [];

        foreach ($rootCategories as $rootCategory) {
            $menu[] = $this->buildCategoryTree($rootCategory);
        }

        return $menu;
    }

    private function buildCategoryTree($category)
    {
        $item = [
            'id' => $category->id,
            'slug' => $category->slug,
            'name' => $category->name[App::currentLocale()],
        ];

        // Отримати всі дочірні категорії
        $children = $category->children;

        if (!$children->isEmpty()) {
            $item['children'] = [];

            foreach ($children as $child) {
                $item['children'][] = $this->buildCategoryTree($child);
            }
        }

        return $item;
    }
}
