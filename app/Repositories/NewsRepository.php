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
            $title = [];
            $description = [];
            $subtitle_1 = [];
            $subtitle_2 = [];
            $description_top = [];
            $description_bottom = [];





            foreach ($langs as $lang){
                if($lang == $locale) {
                    $title[$lang] = $data['title'];
                    $subtitle_1[$lang] = $data['subtitle_1'];
                    $subtitle_2[$lang] = $data['subtitle_2'];
                    $description_top[$lang] = $data['description_top'];
                    $description_bottom[$lang] = $data['description_bottom'];
                }else{
                    $title[$lang] = '';
                    $subtitle_1[$lang] = '';
                    $subtitle_2[$lang] = '';
                    $description_top[$lang] = '';
                    $description_bottom[$lang] = '';
                }
            }
            $d = [
                'subtitle_1'=> $subtitle_1,
                'subtitle_2'=> $subtitle_2,
                'description_top'=> $description_top,
                'description_bottom'=> $description_bottom,
            ];
            $data['description'] =  $d;

            $data['title'] = $title;
//            dd($data);
            $news = News::create($data);

            DB::commit();

            return $news;
        } catch (\Exception $e) {
            DB::rollBack();
            logs()->warning($e);

        }
    }

    public function update(News $news, UpdateNewsRequest $request): bool
    {
        try {
            DB::beginTransaction();

            $data = $request->validated();
            $locale = App::currentLocale();
            $langs = config('app.available_locales');



//dd($news);

            foreach ($langs as $lang){

                $dataJson['title'][$lang] = !empty($news->title[$lang]) ? $news->title[$lang] : '';
                $dataJson['description']['subtitle_1'][$lang] = !empty($news->description['subtitle_1'][$lang]) ? $news->description['subtitle_1'][$lang] : '';
                $dataJson['description']['subtitle_2'][$lang] = !empty($news->description['subtitle_2'][$lang]) ? $news->description['subtitle_2'][$lang] : '';
                $dataJson['description']['description_top'][$lang] = !empty($news->description['description_top'][$lang]) ? $news->description['description_top'][$lang] : '';
                $dataJson['description']['description_bottom'][$lang] = !empty($news->description['description_bottom'][$lang]) ? $news->description['description_bottom'][$lang] : '';

                if($lang == $locale) {
                    $dataJson['title'][$lang] = $request->title;
                    $dataJson['description']['subtitle_1'][$lang] = $data['subtitle_1'];
                    $dataJson['description']['subtitle_2'][$lang] = $data['subtitle_2'];
                    $dataJson['description']['description_top'][$lang] = $data['description_top'];
                    $dataJson['description']['description_bottom'][$lang] = $data['description_bottom'];
                }
            }
            $data = array_merge($data,$dataJson);
//            dd($data);
            $news->update($data);


            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            logs()->warning($e);
            return false;
        }
    }
}
