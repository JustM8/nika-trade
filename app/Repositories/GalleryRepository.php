<?php

namespace App\Repositories;

use App\Http\Requests\CreateGalleryRequest;
use App\Http\Requests\UpdateGalleryRequest;
use App\Models\Gallery;
use App\Repositories\Contracts\GalleryRepositoryContract;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class GalleryRepository implements GalleryRepositoryContract
{
    function clearValues($array) {
        $result = [];
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $result[$key] = $this->clearValues($value);
            } else {
                $result[$key] = is_string($value) ? "" : [];
            }
        }
        return $result;
    }
    public function create(CreateGalleryRequest $request): Gallery|bool
    {
        try {
            DB::beginTransaction();


            $data = $request->validated();
            $locale = App::currentLocale();
            $langs = config('app.available_locales');

            $descriptionContent = [];

            foreach ($langs as $lang){
                if($lang == $locale) {
                    $descriptionContent[$lang] = $data['data']['fields'];
                }else{

                    $descriptionContent[$lang] = $this->clearValues($data['data']['fields']);
                }
            }
            $images = $data['images'] ?? [];
            $data['data'] = $descriptionContent;
            $categoryIds = $data['category'];

            $gallery = Gallery::create($data);
            $gallery->categories()->attach($categoryIds);

            ImageRepository::attach($gallery, 'images',$images);

            DB::commit();

            return $gallery;
        } catch (\Exception $e) {
            DB::rollBack();
            logs()->warning($e);
            return false;
        }
    }

    public function update(Gallery $gallery, UpdateGalleryRequest $request): bool
    {
        try {

            DB::beginTransaction();

            $data = $request->validated();
            $locale = App::currentLocale();
            $langs = config('app.available_locales');

            foreach ($langs as $lang){
                if($lang == $locale) {
                    $descriptionContent[$lang] = $data['data']['fields'];
                }else{
                    if(!empty($gallery->data[$lang])) {
                        $descriptionContent[$lang] = $gallery->data[$lang];
                    }else{
                        $descriptionContent[$lang] = '';
                    }
                }
            }

            $data['data'] = $descriptionContent;
            $gallery->update($data);
            ImageRepository::attach($gallery, 'images',$request->images ?? []);

            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            logs()->warning($e);
            return false;
        }
    }
}

