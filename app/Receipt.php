<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;
use App\OrderReceipt;

class Receipt extends Model
{
    protected $fillable = [
        'code',
        'date_time',
        'amount',
        'received_usd',
        'received_riel',
        'changed_usd',
        'changed_riel',
        'created_by',
        'updated_by',
    ];

    protected $dates = [ 'date_time' ];

    protected static function boot()
    {
        parent::boot();
  
        static::creating(function($model) {
            $model->created_by = auth()->check() ? auth()->user()->username : null;
            $model->updated_by = auth()->check() ? auth()->user()->username : null;
        });
  
        static::updating(function($model) {
            $model->updated_by = auth()->check() ? auth()->user()->username : null;
        });
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class)->using(OrderReceipt::class);
    }
}
