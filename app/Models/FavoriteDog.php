<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FavoriteDog extends Model
{
    protected $fillable = [
        'breed',
        'image_url',
    ];
}
