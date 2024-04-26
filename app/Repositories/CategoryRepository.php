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
            $postTitleContent = [];
            $descriptionContent = [];
            $descriptionContentL = [];
            $descriptionContentR = [];

            foreach ($langs as $lang){
                if($lang == $locale) {
                    $nameContent[$lang] = $request->name;
                    $postTitleContent[$lang] = $request->post_title;
                    $descriptionContent[$lang] = $request->description;
                    $descriptionContentL[$lang] = $request->description_l;
                    $descriptionContentR[$lang] = $request->description_r;
                }else{
                    $nameContent[$lang] = '';
                    $postTitleContent[$lang] = '';
                    $descriptionContent[$lang] = '';
                    $descriptionContentL[$lang] = '';
                    $descriptionContentR[$lang] = '';
                }
            }
            $data['name'] = $nameContent;
            $data['post_title'] = $postTitleContent;
            $data['description'] = $descriptionContent;
            $data['description_l'] = $descriptionContentL;
            $data['description_r'] = $descriptionContentR;

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
                    $postTitleContent[$lang] = $request->post_title;
                    $descriptionContent[$lang] = $request->description;
                    $descriptionContentL[$lang] = $request->description_l;
                    $descriptionContentR[$lang] = $request->description_r;
                }else{
                    if(!empty($category->name[$lang])) {
                        $nameContent[$lang] = $category->name[$lang];
                        $postTitleContent[$lang] = $request->post_title[$lang];
                        $descriptionContent[$lang] = $category->description[$lang];
                        $descriptionContentL[$lang] = $category->description_l[$lang];
                        $descriptionContentR[$lang] = $category->description_r[$lang];
                    }else{
                        $nameContent[$lang] = '';
                        $postTitleContent[$lang] = '';
                        $descriptionContent[$lang] = '';
                        $descriptionContentL[$lang] = '';
                        $descriptionContentR[$lang] = '';
                    }
                }
            }
            $data['name'] = $nameContent;
            $data['post_title'] = $postTitleContent;
            $data['description'] = $descriptionContent;
            $data['description_l'] = $descriptionContentL;
            $data['description_r'] = $descriptionContentR;
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
