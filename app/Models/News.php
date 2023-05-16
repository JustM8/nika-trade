<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class News extends Model
{
    use HasFactory;

    protected $guarded = [];


    /**
     * Write code on Method
     *
     * @return response()
     */
    protected $fillable = [
        'slug','title','description','thumbnail'
    ];

    protected $casts = [
        'description' => 'array',
        'title' => 'array',
    ];
    /**
     * Get the user's first name.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
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
}
