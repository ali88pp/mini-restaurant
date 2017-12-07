<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
