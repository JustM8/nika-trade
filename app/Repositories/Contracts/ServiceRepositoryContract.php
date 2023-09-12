<?php

namespace App\Repositories\Contracts;

use App\Http\Requests\CreateServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Service;

interface ServiceRepositoryContract
{
    public function create(CreateServiceRequest $request):Service|bool;
    public function update(Service $service, UpdateServiceRequest $request):bool;
}
