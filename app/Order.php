<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  protected $table = 'orders';

  protected $fillable = [
    'datetime',
    'table_no',
    'queue_no',
    'customer_id',
    'amount',
    'vat',
    'discount',
    'grand_total',
    'memo',
    'sale_id',
    'status',
    'order_by_id'
  ];
}
