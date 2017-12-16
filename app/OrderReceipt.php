<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;
use App\Receipt;

class OrderReceipt extends Pivot
{
    protected $table = 'order_receipt';

    protected $fillable =  [
        'order_id',
        'receipt_id',
    ];

    public function receipt() {
        return $this->BelongsTo(Receipt::class);
    }
}
