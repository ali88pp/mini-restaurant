<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\OrderDetail;

class Order extends Model
{
  protected $table = 'orders';

  protected $fillable = [
    'code',
    'date_time',
    'queue',
    'table',
    'amount',
    'status',
    'created_by',
    'updated_by',
  ];

  protected $dates = [ 'date_time' ];

  public function details()
  {
    return $this->hasMany(OrderDetail::class, 'order_id');
  }
}
