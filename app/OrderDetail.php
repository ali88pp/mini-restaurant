<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = [
        'order_id',
        'item_name',
        'item_id',
        'item_type',
        'quantity',
        'unit_price',
    ];

    public function orderable()
    {
        return $this->morphTo();
    }
}
