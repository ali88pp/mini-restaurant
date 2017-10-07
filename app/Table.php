<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
  protected $table = 'tables';
  public $primaryKey = 'no';
  protected $fillable = [ 'no', 'is_available', 'seat', 'floor', 'block' ];
}
