<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;

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

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function item()
    {
        return $this->morphTo();
    }
}
