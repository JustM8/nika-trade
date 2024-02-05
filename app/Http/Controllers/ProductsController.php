<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
{
    public function show(Product $product)
    {
        $childrens = $product->children;
        $breadcrumbs = array_reverse($product->breadcrumbs);
        $recommendedProducts = $product->recommendedProducts;
        $categorySlug = $this->getCategorySlug($product->id);
//dd($breadcrumbs);
        $categories = $product->categories;
        $category = $categories->first();
        $rootParent = $category->findRootParent();

//        $menu = $this->getMenu();
        $currentCategorySlug = Session::get('current_category_slug');
        $currentCategoryId = Session::get('current_category_id');

        return view('products.show',
            ['title'=>__('catalog.Title').' - '.$product->title[App::currentLocale()]],
            compact('product','recommendedProducts','childrens','categorySlug','breadcrumbs','rootParent','currentCategorySlug','currentCategoryId')
        );
    }

    public function getCategorySlug($productId)
    {
        $product = Product::find($productId);

        if ($product) {
            $category = $product->categories()->first(); // Assuming a product belongs to only one category

            if ($category) {
                // Save the current category slug in the session
//                Session::put('current_category_slug', $category->slug);
                $categorySlug = $category->slug;
                return $categorySlug;
            } else {
                return "Категорія не визначена";
            }
        } else {
            return "Товар не знайдено";
        }
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
