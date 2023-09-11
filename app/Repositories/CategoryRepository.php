<?php

namespace App\Repositories;

use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryContract;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class CategoryRepository implements CategoryRepositoryContract
{
    public function __construct(protected Category $category)
    {
    }

    public function create(CreateCategoryRequest $request): Category|bool
    {
        try {
            DB::beginTransaction();

            $data = $request->validated();
            $locale = App::currentLocale();
            $langs = config('app.available_locales');
            $nameContent = [];
            $descriptionContent = [];

            foreach ($langs as $lang){
                if($lang == $locale) {
                    $nameContent[$lang] = $request->name;
                    $descriptionContent[$lang] = $request->description;
                }else{
                    $nameContent[$lang] = '';
                    $descriptionContent[$lang] = '';
                }
            }
            $data['name'] = $nameContent;
            $data['description'] = $descriptionContent;

            $category = Category::create($data);

            DB::commit();

            return $category;
        } catch (\Exception $e) {
            DB::rollBack();
            logs()->warning($e);
            return false;
        }
    }

    public function update(Category $category, UpdateCategoryRequest $request): bool
    {
        try {
            DB::beginTransaction();
            $data = $request->validated();
            $locale = App::currentLocale();
            $langs = config('app.available_locales');

            foreach ($langs as $lang){
                if($lang == $locale) {
                    $nameContent[$lang] = $request->name;
                    $descriptionContent[$lang] = $request->description;
                }else{
                    if(!empty($category->name[$lang])) {
                        $nameContent[$lang] = $category->name[$lang];
                        $descriptionContent[$lang] = $category->description[$lang];
                    }else{
                        $nameContent[$lang] = '';
                        $descriptionContent[$lang] = '';
                    }
                }
            }
            $data['name'] = $nameContent;
            $data['description'] = $descriptionContent;
            $category->update($data);

            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            logs()->warning($e);
            return false;
        }
    }
}
