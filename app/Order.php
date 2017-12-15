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

  protected static function boot()
  {
    parent::boot();

    static::creating(function($model) {
      $model->created_by = auth()->check() ? auth()->user()->username : '';
      $model->updated_by = auth()->check() ? auth()->user()->username : '';
    });

    static::updating(function($model) {
      $model->updated_by = auth()->check() ? auth()->user()->username : '';
    });
  }

  protected $dates = [ 'date_time' ];

  public function details()
  {
    return $this->hasMany(OrderDetail::class, 'order_id');
  }
}
