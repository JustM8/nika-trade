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
        $services = Service::all();
        return view('admin/services/index',['title'=>__('service.Title')],compact('services'));
    }

    public function create()
    {
        return view('admin/services/create',['title'=>__('service.Title')]);
    }

    public function store(CreateServiceRequest $request)
    {
        if($this->repository->create($request)){
            return redirect()->route('admin.services.index');
        }else{
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
            return redirect()->route('admin.services.index');
        }
        return redirect()->back()->withInput();
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->back();
    }
}
