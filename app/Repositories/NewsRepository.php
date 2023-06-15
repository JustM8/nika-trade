<?php

namespace App\Repositories;

use App\Http\Requests\CreateNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Models\News;
use App\Repositories\Contracts\NewRepositoryContract;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class NewsRepository implements NewRepositoryContract
{
    public function __construct(protected News $news)
    {

    }
    public function create(CreateNewsRequest $request): News|bool
    {
        try {
            DB::beginTransaction();

            $data = $request->validated();
            $locale = App::currentLocale();
            $langs = config('app.available_locales');
            $nameContent = [];

dd($data);
            $data = [
                'slug' => $request->slug,
                'title' => [$locale,'qwe'],
                'description' => [$locale=>$request->row,'count'=>count($request->row)],
                'thumbnail' => 'img.png'
            ];

            foreach ($langs as $lang){
                if($lang == $locale) {
                    $nameContent[$lang] = $request->name;
                }else{
                    $nameContent[$lang] = '';
                }
            }
            $data['name'] = $nameContent;
            $news = News::create($data);

            DB::commit();

            return $news;
        } catch (\Exception $e) {
            DB::rollBack();
            logs()->warning($e);

        }
    }

    public function update(News $category, UpdateNewsRequest $request): bool
    {
        // TODO: Implement update() method.
    }
}
