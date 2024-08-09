<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $categories = Category::all()->take(4);
        $products = Product::all()->where('in_stock','>', '0')->take(6);

//        foreach ($categories as $category){
//            dd($category,$category->products);
//        }


        return view('home', ['title'=>__('home.page_title')], compact('products', 'categories'));
    }
}
