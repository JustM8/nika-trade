<?php

namespace App\Models;

use App\Services\FileStorageService;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

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
        'obj_model'
    ];

    protected $guarded = [];

    protected $casts = [
        'title' => 'array',
        'description' => 'array',
        'size' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
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
        return $this->hasMany(Product::class, 'parent_id');
    }


    public function hasChildren()
    {
        return $this->children()->exists();
    }

    public function getBreadcrumbsAttribute()
    {
        $basePath = 'catalog';

        $breadcrumbs = [];

        $currentCategory = $this->category;

        while ($currentCategory) {
            $breadcrumbs[] = [
                'id' => $currentCategory->id,
                'name' => $currentCategory->name,
                'url' => URL::to("$basePath/{$currentCategory->slug}"),
            ];
            $currentCategory = $currentCategory->parent;
        }

        return array_reverse($breadcrumbs);
    }
}
