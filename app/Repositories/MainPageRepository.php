<?php

namespace App\Repositories;

use App\Http\Requests\CreateMainPageRequest;
use App\Http\Requests\UpdateMainPageRequest;
use App\Models\MainPage;
use App\Repositories\Contracts\MainPageRepositoryContract;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class MainPageRepository implements MainPageRepositoryContract
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
    private function trimToLength($array, $length) {
        return array_slice($array, 0, $length);
    }


    public function create(CreateMainPageRequest $request): MainPage|bool
    {
        try {
            DB::beginTransaction();

            $data = $request->validated();
            $locale = App::currentLocale();
            $langs = config('app.available_locales');
            $descriptionContent = [];

            foreach ($langs as $lang){
                if($lang == $locale) {
                    $descriptionContent[$lang] = $data['data']['slider'];
                }else{
                    $descriptionContent[$lang] = $this->clearValues($data['data']['slider'],true);
                }
            }
            $images = $data['images'] ?? [];
            $data['data'] = $descriptionContent;

            $mainPage = MainPage::create($data);
            ImageRepository::attach($mainPage, 'images',$images);

            DB::commit();

            return $mainPage;
        } catch (\Exception $e) {
            DB::rollBack();
            logs()->warning($e);
            return false;
        }
    }

    public function update(MainPage $mainPage, UpdateMainPageRequest $request): bool
    {
        try {
            DB::beginTransaction();

            $data = $request->validated();
            $locale = App::currentLocale();
            $langs = config('app.available_locales');

            // Очищення даних перед оновленням


            $descriptionContent = [];

            foreach ($langs as $lang) {
                if ($lang == $locale) {
                    $descriptionContent[$lang] = array_values($data['data']['slider']);
                } else {
                    if (!empty($mainPage->data[$lang])) {
                        // Обрізаємо "en" і "ru" до довжини "ua"
                        $descriptionContent[$lang] = $this->trimToLength($mainPage->data[$lang], count($data['data']['slider']));
                    } else {
                        $descriptionContent[$lang] = $this->clearValues($data['data']['slider']);
                    }
                }
            }

            $data['data'] = $descriptionContent;
            $mainPage->update($data);

            ImageRepository::attach($mainPage, 'images',$request->images ?? []);

            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            logs()->warning($e);
            return false;
        }
    }
}
