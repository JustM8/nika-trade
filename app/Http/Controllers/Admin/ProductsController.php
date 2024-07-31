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
use Illuminate\Support\Facades\App;

class ProductsController extends Controller
{
    public function __construct(protected ProductRepository $repository)
    {
    }

    public function index(Request $request)
    {
        $query = Product::with('categories');
        $selectedCategory = null;
        $selectedCategoryData = null;

        if ($request->has('category')) {
            $selectedCategory = $request->input('category');
            $query = $this->filterByCategory($query, $selectedCategory);
        }

        if ($request->has('search')) {
            $query = $this->searchBySku($query, $request->input('search'));
        }

        // Отримуємо продукти з обраними фільтрами
        $products = $query->paginate(50)->appends(request()->query());

        // Знаходимо першу відповідну категорію серед продуктів, якщо категорія була обрана
        if ($selectedCategory) {
            foreach ($products as $product) {
                $selectedCategoryData = $product->categories->firstWhere('id', $selectedCategory);
                if ($selectedCategoryData) {
                    notify()->success("по ".$selectedCategoryData->name[App::currentLocale()],"Відсортовано");
                    break;
                }
            }
        }

        return view('admin.products.index', ['title' => __('product.Products')], compact('products','selectedCategoryData'));
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
            notify()->success("успішно оновлено","Продукт");
            return redirect()->route('admin.products.index', request()->query());
        }else{
            return redirect()->back()->withInput();
        }
    }

    public function store(CreateProductRequest $request)
    {
        if($this->repository->create($request)){
            notify()->success("успішно створено","Продукт");
            return redirect()->route('admin.products.index', request()->query());
        }else{
            return redirect()->back()->withInput();
        }
    }

    public function destroy(Product $product)
    {
        try {
            $product->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Продукт успішно видалено'
            ], 200); // 200 OK
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Сталася помилка при видаленні продукту'
            ], 500); // 500 Internal Server Error
        }
    }
}
