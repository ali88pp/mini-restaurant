<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';

    protected $fillable = [
    	'code',
    	'name',
    	'remark',
    	'price',
    	'category_id'
    ];

    
}
