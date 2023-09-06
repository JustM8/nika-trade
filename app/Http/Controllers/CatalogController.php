<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CatalogController extends Controller
{

    public function index()
    {
        $rootCategories = Category::rootCategories()->get();
        return view('catalog.index',['title'=>__('catalog.Title')], compact('rootCategories'));
    }

    public function show($slug)
    {
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
            $products = $category->products;
            if($products->isEmpty()){
                $products = $products->collect();
            }
        }

        $menu = $this->getMenu();

        return view('catalog.show',['title'=>__('catalog.Title').' - '.$category->name[App::currentLocale()]], compact('category','childrens','childrensOfChildrens','menu','products'));
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
