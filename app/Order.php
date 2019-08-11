<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\OrderDetail;
use App\OrderReceipt;
use App\Receipt;

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

    public function details()
    {
        return $this->hasMany(OrderDetail::class, 'order_id');
    }

    public function order_receipt()
    {
        return $this->hasOne(OrderReceipt::class, 'order_id');
    }

    public function receipts()
    {
        return $this->belongsToMany(Receipt::class)->using(OrderReceipt::class);
    }

    public function getReceiptAttribute()
    {
        return $this->receipts->first();
    }
}
