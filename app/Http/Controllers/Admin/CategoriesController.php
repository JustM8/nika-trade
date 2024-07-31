<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CategoriesController extends Controller
{
    public function __construct(protected CategoryRepository $repository)
    {
    }
    public function index(Request $request)
    {
        $query = Category::withCount('products');

        if ($request->has('search')) {
            $query = $this->searchByName($query, $request->input('search'));
        }

        $categories = $query->paginate(10)->appends(request()->query());

        return view('admin/categories/index',['title'=>__('categories.Title')], compact('categories'));
    }

    protected function searchByName($query, $searchTerm)
    {
        return $query->where('name', 'LIKE', "%$searchTerm%");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create( Category $category)
    {
        $parents = Category::all()->except($category->id);
        return view('admin/categories/create', compact('parents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateCategoryRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateCategoryRequest $request)
    {
        if($this->repository->create($request)){
            notify()->success("успішно створено","Категорію");
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

        if($this->repository->update($category,$request)){
            notify()->success("успішно оновлено","Категорію");
            return redirect()->route('admin.categories.index',request()->query());
        }
        return redirect()->back()->withInput();
    }

    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Категорію успішно видалено'
            ], 200); // 200 OK
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Сталася помилка при видаленні категорії'
            ], 500); // 500 Internal Server Error
        }
    }
}
