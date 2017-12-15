<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderReceipt extends Pivot
{
    protected $table = 'order_receipt';

    protected $fillable =  [
        'order_id',
        'receipt_id',
    ];
}
