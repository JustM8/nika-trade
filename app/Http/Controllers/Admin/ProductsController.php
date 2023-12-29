<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Repositories\ProductRepository;

class ProductsController extends Controller
{
    public function __construct(protected ProductRepository $repository)
    {
    }

    public function index()
    {
//        $products = Product::with('category')->paginate(5);
        $products = Product::with('categories')->paginate(5);
//        dd($products);
        return view('admin/products/index', compact('products'));
    }

    public function create()
    {
        $categories = Category::nonRootCategories()->get();
        $products = Product::all();
        return view('admin/products/create', compact('categories','products'));
    }

    public function edit(Product $product)
    {
//        $categories = Category::nonRootCategories()->get();
        $categories = Category::whereNotNull('parent_id')->get();
        $products = Product::all();
        $recommendedProducts = $product->recommendedProducts;
        $parents = Product::all()->except($product->id);
//dd($parents);
        return view('admin/products/edit',['title'=>__('product.Title')], compact('product','categories','recommendedProducts','products','parents'));
    }

    public function update(UpdateProductRequest $request,Product $product )
    {
        if($this->repository->update($product,$request)){
            return redirect()->route('admin.products.index');
        }else{
            return redirect()->back()->withInput();
        }
    }

    public function store(CreateProductRequest $request)
    {
        if($this->repository->create($request)){
            return redirect()->route('admin.products.index');
        }else{
            return redirect()->back()->withInput();
        }
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index');
    }
}
