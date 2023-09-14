<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainPage extends Model
{
    use HasFactory;

    public $table = "main_page";

    protected $guarded = [];

    protected $fillable = [
        'data',
    ];
    protected $casts = [
        'data' => 'array',
    ];

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
