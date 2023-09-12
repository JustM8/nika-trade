<?php

namespace App\Repositories;

use App\Http\Requests\CreateServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Service;
use App\Repositories\Contracts\ServiceRepositoryContract;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class ServiceRepository implements ServiceRepositoryContract
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

    public function create(CreateServiceRequest $request): Service|bool
    {
        try {
            DB::beginTransaction();

            $data = $request->validated();
            $locale = App::currentLocale();
            $langs = config('app.available_locales');

            $descriptionContent = [];

            foreach ($langs as $lang){

                if (!empty($data['data']['fields']['designer']))
                {
                    $data['data']['fields']['designer'] = true;
                }else{
                    $data['data']['fields']['designer'] = false;
                }

                if($lang == $locale) {
                    $descriptionContent[$lang] = $data['data']['fields'];
                }else{

                    $descriptionContent[$lang] = $this->clearValues($data['data']['fields']);
                }
            }

            $data['data'] = $descriptionContent;
            $service = Service::create($data);

            DB::commit();

            return $service;
        } catch (\Exception $e) {
            DB::rollBack();
            logs()->warning($e);
            return false;
        }
    }

    public function update(Service $service, UpdateServiceRequest $request): bool
    {
        try {
            DB::beginTransaction();

            $data = $request->validated();
            $locale = App::currentLocale();
            $langs = config('app.available_locales');

            foreach ($langs as $lang){
                if (!empty($data['data']['fields']['designer']))
                {
                    $data['data']['fields']['designer'] = true;
                }else{
                    $data['data']['fields']['designer'] = false;
                }
                if($lang == $locale) {
                    $descriptionContent[$lang] = $data['data']['fields'];
                }else{
                    if(!empty($service->data[$lang])) {
                        $descriptionContent[$lang] = $service->data[$lang];
                    }else{
                        $descriptionContent[$lang] = '';
                    }
                }
            }

            $data['data'] = $descriptionContent;
            $service->update($data);

            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            logs()->warning($e);
            return false;
        }
    }
}
