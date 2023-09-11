<?php

namespace App\Repositories\Contracts;

use App\Http\Requests\CreateGalleryRequest;
use App\Http\Requests\UpdateGalleryRequest;
use App\Models\Gallery;

interface GalleryRepositoryContract
{
    public function create(CreateGalleryRequest $request):Gallery|bool;
    public function update(Gallery $gallery,UpdateGalleryRequest $request):bool;
}
