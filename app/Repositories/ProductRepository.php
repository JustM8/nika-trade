<?php

namespace App\Repositories;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\RecommendedProduct;
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
//            dd($data);
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
//dd($data);
            $images = $data['images'] ?? [];

//            $category = Category::find($data['category']);
//            $product = $category->products()->create($data);

            $categoryIds = $data['category']; // Припустимо, що ви отримали масив ідентифікаторів категорій
//            dd($categoryIds);
            $product = Product::create($data);
// Додаємо відносини до таблиці category_product
            $product->categories()->attach($categoryIds);

            // Перевірте, чи існує рекомендований продукт з переданим recommended_id
            if ($request->has('recommended_id')) {
                $recommendedProductIds = $request->input('recommended_id');

                foreach ($recommendedProductIds as $recommendedProductId) {
                    $recommendedProduct = Product::find($recommendedProductId);

                    if ($recommendedProduct) {
                        // Створіть запис для рекомендованого продукту
                        $recommendedProduct = new RecommendedProduct(['product_id' => $product->id, 'recommended_id' => $recommendedProductId]);
                        $recommendedProduct->save();
                    }
                }
            }

            ImageRepository::attach($product, 'images',$images);

            DB::commit();

            return $product;
        } catch (\Exception $e) {
            DB::rollBack();
            logs()->warning($e);
            return false;
        }
    }

    public function update(Product $product, UpdateProductRequest $request): bool
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

            $product->update($data);
            $product->categories()->sync($request->input('category'));
            $product->recommendedProducts()->detach();

            // Додавання нових рекомендованих продуктів
            if ($request->has('recommended_id') && !in_array(null, $request->input('recommended_id'))) {
                $recommendedProductIds = $request->input('recommended_id');
                $product->recommendedProducts()->attach($recommendedProductIds);
            }

            ImageRepository::attach($product, 'images',$request->images ?? []);

            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            logs()->warning($e);
            return false;
        }
    }
}
