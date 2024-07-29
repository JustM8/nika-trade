<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Service;
use App\Repositories\ServiceRepository;

class ServicesController extends Controller
{
    public function __construct(protected ServiceRepository $repository)
    {
    }

    public function index()
    {
        $services = Service::query()
            ->orderBy('created_at', 'desc')
            ->get();
        return view('admin/services/index',['title'=>__('service.Title')],compact('services'));
    }

    public function create()
    {
        return view('admin/services/create',['title'=>__('service.Title')]);
    }

    public function store(CreateServiceRequest $request)
    {
        if($this->repository->create($request)){
            notify()->success("успішно створений","Сервіс");
            return redirect()->route('admin.services.index');
        }else{
            notify()->warning("не створений","Сервіс");
            return redirect()->back()->withInput();
        }
    }

    public function edit(Service $service)
    {
        return view('admin/services/edit',['title'=>__('service.Title')], compact('service'));
    }

    public function update(UpdateServiceRequest $request, Service $service)
    {
        if($this->repository->update($service,$request)){
            notify()->success("успішно оновлений","Сервіс");
            return redirect()->route('admin.services.index');
        }
        notify()->warning("не оновлений","Сервіс");
        return redirect()->back()->withInput();

    }

//    public function destroy(Service $service)
//    {
//        $service->delete();
//        notify()->success("успішно видалено","Сервіс");
//        return redirect()->back();
//    }
    public function destroy(Service $service)
    {
        try {
            $service->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Сервіс успішно видалено'
            ], 200); // 200 OK
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Сталася помилка при видаленні сервісу'
            ], 500); // 500 Internal Server Error
        }
    }

}

