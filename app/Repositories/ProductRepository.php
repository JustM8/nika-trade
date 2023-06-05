<?php

namespace App\Repositories;

use App\Http\Requests\CreateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryContract;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class ProductRepository implements ProductRepositoryContract
{
    public function __construct(protected Product $product)
    {
    }

    public function create(CreateProductRequest $request): Product|bool
    {
        try {
            DB::beginTransaction();

            $locale = App::currentLocale();
            $langs = config('app.available_locales');

            $data = $request->validated();
            $dataJson = [];

            foreach ($langs as $lang) {
                $dataJson['title'][$lang] = !empty($product->title[$lang]) ? $product->title[$lang] : '';
                $dataJson['description'][$lang] = !empty($product->description[$lang]) ? $product->description[$lang] : '';
                $dataJson['size'][$lang] = !empty($product->size[$lang]) ? $product->size[$lang] : '';

                if ($lang == $locale) {
                    $dataJson['title'][$lang] = $request->title;
                    $dataJson['description'][$lang] = $request->description;
                    $dataJson['size'][$lang] = $request->size;
                }
            }

            $data['title'] = $dataJson['title'];
            $data['description'] = $dataJson['description'];
            $data['size'] = $dataJson['size'];

            $images = $data['images'] ?? [];
            $category = Category::find($data['category']);
            $product = $category->products()->create($data);
            ImageRepository::attach($product, 'images',$images);

            DB::commit();

            return $product;
        } catch (\Exception $e) {
            DB::rollBack();
            logs()->warning($e);
            return false;
        }
    }
}
