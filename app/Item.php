<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

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

    protected $casts = [
      'price' => 'array'
    ];

    public function category ()
    {
       return $this->hasOne(Category::class, 'id', 'category_id');
    }


}
