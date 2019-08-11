<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\OrderDetail;

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

    public function items()
    {
        return $this->morphMany(OrderDetail::class, 'item');
    }
}
