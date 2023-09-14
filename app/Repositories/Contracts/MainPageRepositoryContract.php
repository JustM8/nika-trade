<?php

namespace App\Repositories\Contracts;

use App\Http\Requests\CreateMainPageRequest;
use App\Http\Requests\UpdateMainPageRequest;
use App\Models\MainPage;

interface MainPageRepositoryContract
{
    public function create(CreateMainPageRequest $request):MainPage|bool;
    public function update(MainPage $mainPage, UpdateMainPageRequest $request):bool;
}
