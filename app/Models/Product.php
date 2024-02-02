<?php

namespace App\Models;

use App\Services\FileStorageService;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Session;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'parent_id',
        'title',
        'description',
        'price',
        'discount',
        'thumbnail',
        'in_stock',
        'SKU',
        'slug',
        'pdf',
        'obj_model',
        'priority',
        'is_public',
    ];

    protected $guarded = [];

    protected $casts = [
        'title' => 'array',
        'description' => 'array',
        'size' => 'array',
    ];

//    public function category()
//    {
//        return $this->belongsTo(Category::class);
//    }
    public function categories()
    {
//        return $this->belongsToMany(Category::class);
        return $this->belongsToMany(Category::class, 'category_product');

    }


    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function setThumbnailAttribute($image)
    {
        if(!empty($this->attributes['thumbnail'])){
            FileStorageService::remove($this->attributes['thumbnail']);
        }

        $this->attributes['thumbnail'] = FileStorageService::upload($image);
    }
    public function setPdfAttribute($image)
    {
        if(!empty($this->attributes['pdf'])){
            FileStorageService::remove($this->attributes['pdf']);
        }

        $this->attributes['pdf'] = FileStorageService::upload($image);
    }
    public function setObjModelAttribute($image)
    {
        if(!empty($this->attributes['obj_model'])){
            FileStorageService::remove($this->attributes['obj_model']);
        }

        $this->attributes['obj_model'] = FileStorageService::upload($image);
    }

    public function thumbnailUrl(): Attribute
    {
        return new Attribute(get: fn() => Storage::url($this->attributes['thumbnail']));
    }

    public function objmodelUrl(): Attribute
    {
        return new Attribute(get: fn() => Storage::url($this->attributes['obj_model']));
    }
    public function pdflUrl(): Attribute
    {
        return new Attribute(get: fn() => Storage::url($this->attributes['pdf']));
    }


    public function endPrice(): Attribute
    {
        return new Attribute(
            get: function () {
                $price = is_null($this->attributes['discount']) || $this->attributes['discount'] === 0
                ? $this->attributes['price']
                : ($this->attributes['price'] - ($this->attributes['price'] * ($this->attributes['discount'] / 100)));

                return $price < 0 ? 1 : round($price,2);
            }
        );
    }

    public function recommendedProducts()
    {
        return $this->belongsToMany(Product::class, 'recommended_products', 'product_id', 'recommended_id');
    }

    public function parent()
    {
        return $this->belongsTo(Product::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Product::class, 'parent_id')
            ->whereNotNull('parent_id')
            ->where('is_public', 1)
            ->orderBy('priority', 'asc');
    }


    public function hasChildren()
    {
        return $this->children()->exists();
    }



    public function getBreadcrumbsAttribute()
    {
        $basePath = 'catalog';

        $breadcrumbs = [];

        // Get the current category slug from the session
        $currentCategorySlug = Session::get('current_category_slug');

        // Assuming $this->categories is the relationship to the categories through category_product
        $currentCategories = $this->categories;

        foreach ($currentCategories as $currentCategory) {
            if ($currentCategory->slug === $currentCategorySlug) {
                $breadcrumbs[] = [
                    'id' => $currentCategory->id,
                    'name' => $currentCategory->name,
                    'url' => URL::to("$basePath/{$currentCategory->slug}"),
                    'active' => true,
                ];

                // Add parent categories if needed
                $parentCategory = $currentCategory->parent;
                while ($parentCategory) {
                    $breadcrumbs[] = [
                        'id' => $parentCategory->id,
                        'name' => $parentCategory->name,
                        'url' => URL::to("$basePath/{$parentCategory->slug}"),
                        'active' => false,
                    ];
                    $parentCategory = $parentCategory->parent;
                }
            }
        }

        return $breadcrumbs;
    }

}
