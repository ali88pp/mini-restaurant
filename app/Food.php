<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $fillable = [
        'code',
        'name',
        'description',
        'cost',
        'price',
        'category_id',
        'image_uri',
        'is_available',
    ];
}
