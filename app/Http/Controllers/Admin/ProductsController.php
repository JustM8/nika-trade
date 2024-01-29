<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function __construct(protected ProductRepository $repository)
    {
    }

    public function index(Request $request)
    {
//        $products = Product::with('categories')->paginate(50);
//        return view('admin/products/index',['title'=>__('product.indexTitle')], compact('products'));

        $query = Product::with('categories');

        if ($request->has('category')) {
            $category = $request->input('category');
            $query->whereHas('categories', function ($q) use ($category) {
                $q->where('categories.id', $category); // Зміна тут
            });
        }

        // Додайте логіку для пошуку за полем SKU
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where('sku', 'LIKE', "%$searchTerm%");
        }

        $products = $query->paginate(50);

        return view('admin.products.index', compact('products'));

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
        return view('admin/products/edit',['title'=>__('product.editTitle')], compact('product','categories','recommendedProducts','products','parents'));
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
