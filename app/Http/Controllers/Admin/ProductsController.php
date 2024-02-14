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
        $query = Product::with('categories');

        if ($request->has('category')) {
            $query = $this->filterByCategory($query, $request->input('category'));
        }

        if ($request->has('search')) {
            $query = $this->searchBySku($query, $request->input('search'));
        }
//        dd($query);
        // Додайте інші фільтри, якщо потрібно

        $products = $query->paginate(50)->appends(request()->query());
//        dd($products);

        return view('admin.products.index', ['title' => __('product.Products')], compact('products'));
    }

    protected function filterByCategory($query, $category)
    {
        return $query->whereHas('categories', function ($q) use ($category) {
            $q->where('categories.id', $category);
        });
    }

    protected function searchBySku($query, $searchTerm)
    {
        return $query->where('sku', 'LIKE', "%$searchTerm%");
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
//            return redirect()->route('admin.products.index');
            return redirect()->back()->withInput()->with('success', 'Товар успішно оновлено');
        }else{
            return redirect()->back()->withInput();
        }
    }

    public function store(CreateProductRequest $request)
    {

        if($this->repository->create($request)){
//            return redirect()->route('admin.products.index');
            return redirect()->back()->withInput()->with('success', 'Товар успішно оновлено');
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
