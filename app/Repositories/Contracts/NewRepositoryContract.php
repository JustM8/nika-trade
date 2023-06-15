<?php

namespace App\Repositories\Contracts;

use App\Http\Requests\CreateNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Models\News;
use App\Repositories\NewsRepository;

interface NewRepositoryContract
{
    public function create(CreateNewsRequest $request):News|bool;
    public function update(News $category, UpdateNewsRequest $request):bool;
}
