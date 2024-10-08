<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateGalleryRequest;
use App\Http\Requests\UpdateGalleryRequest;
use App\Models\Category;
use App\Models\Gallery;
use App\Repositories\GalleryRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class GalleriesController extends Controller
{
    public function __construct(protected GalleryRepository $repository)
    {
    }

    public function index(Request $request)
    {
        $query = Gallery::with('categories');

        if ($request->has('category')) {
            $query = $this->filterByCategory($query, $request->input('category'));
        }
        $galleries = $query->orderBy('date', 'desc')->paginate(50)->appends(request()->query());
//        $galleries = Gallery::all();
        return view('admin/galleries/index',['title'=>__('gallery.page_title')],compact('galleries'));
    }

    public function create()
    {
        $today = Carbon::today()->toDateString();
        $categories = Category::nonRootCategories()->get();
        return view('admin/galleries/create',['title'=>__('gallery.page_title_create')],compact('categories','today'));
    }

    public function store(CreateGalleryRequest $request)
    {

        if($this->repository->create($request)){
            notify()->success("успішно створено","Галерею");
            return redirect()->route('admin.galleries.index');
        }else{
            notify()->warning("не створено","Галерею");
            return redirect()->back()->withInput();
        }
    }

    public function edit(Gallery $gallery)
    {
        $categories = Category::whereNotNull('parent_id')->get();
        return view('admin/galleries/edit',['title'=>__('gallery.page_title')], compact('gallery','categories'));
    }

    public function update(UpdateGalleryRequest $request, Gallery $gallery)
    {
        if($this->repository->update($gallery,$request)){
            notify()->success("успішно оновлено","Галерею");
            return redirect()->route('admin.galleries.index');
        }
        notify()->warning("не оновлено","Галерею");
        return redirect()->back()->withInput();
    }

    public function destroy(Gallery $gallery)
    {
        try {
            $gallery->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Галерею успішно видалено'
            ], 200); // 200 OK
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Сталася помилка при видаленні галереї'
            ], 500); // 500 Internal Server Error
        }
    }

    protected function filterByCategory($query, $category)
    {
        return $query->whereHas('categories', function ($q) use ($category) {
            $q->where('categories.id', $category);
        });
    }
}
