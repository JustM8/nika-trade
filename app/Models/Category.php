<?php

namespace App\Models;

use App\Services\FileStorageService;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'name',
        'parent_id',
        'slug',
        'post_title',
        'description',
        'description_l',
        'description_r',
        'thumbnail'
    ];
    protected $casts = [
        'name' => 'array',
        'post_title' => 'array',
        'description' => 'array',
        'description_l' => 'array',
        'description_r' => 'array',
    ];


//    public function products()
//    {
//        return $this->hasMany(Product::class);
//    }
    public function products()
    {
//        return $this->belongsToMany(Product::class);
        return $this->belongsToMany(Product::class, 'category_product');
    }
    public function galleries()
    {
        return $this->belongsToMany(Gallery::class, 'category_gallery');
    }

    protected function data(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value),
        );
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

    public function thumbnailUrl(): Attribute
    {
        return new Attribute(get: fn() => Storage::url($this->attributes['thumbnail']));
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }


    public function hasChildren()
    {
        return $this->children()->exists();
    }

    public function hasProducts()
    {
        return $this->products()->exists();
    }

    public function scopeRootCategories($query)
    {
        return $query->whereNull('parent_id');
    }

    public function scopeLeafCategories($query)
    {
        return $query->whereDoesntHave('children')->whereHas('products');
    }

    public function scopeNonRootCategories($query)
    {
        return $query->whereNotNull('parent_id');
    }

    public function findRootParent()
    {
        $category = $this;

        // Якщо у поточної категорії є батько, рекурсивно визначте найголовнішого предка
        while ($category->parent_id !== null) {
            $category = Category::find($category->parent_id);
        }

        // Якщо категорія не має батька, це найголовніший предок
        return $category;
    }

    public function getBreadcrumbsAttribute()
    {
        $basePath = 'catalog';

        $breadcrumbs = [
            [
                'id' => $this->id,
                'name' => $this->name,
                'url' => URL::to("$basePath/{$this->slug}"),
            ]
        ];

        $currentCategory = $this;

        while ($currentCategory->parent) {
            array_unshift($breadcrumbs, [
                'id' => $currentCategory->parent->id,
                'name' => $currentCategory->parent->name,
                'url' => URL::to("$basePath/{$currentCategory->parent->slug}"),
            ]);
            $currentCategory = $currentCategory->parent;
        }

        return $breadcrumbs;
    }
}
