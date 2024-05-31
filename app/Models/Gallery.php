<?php

namespace App\Models;

use App\Services\FileStorageService;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Gallery extends Model
{
    use HasFactory;
//    public $table = "gallerys";

    protected $guarded = [];

    protected $fillable = [
        'data',
        'date',
        'thumbnail',
    ];
    protected $casts = [
        'data' => 'array',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_gallery');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }


//    public function setThumbnailAttribute($image)
//    {
//        if(!empty($this->attributes['thumbnail'])){
//            FileStorageService::remove($this->attributes['thumbnail']);
//        }
//
//        $this->attributes['thumbnail'] = FileStorageService::upload($image);
//    }
//
//    public function thumbnailUrl(): Attribute
//    {
//        return new Attribute(get: fn() => Storage::url($this->attributes['thumbnail']));
//    }
}
