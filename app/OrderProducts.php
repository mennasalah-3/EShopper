<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProducts extends Model
{
    protected $fillable =['order_Id','product_Id','quantity'];
   protected $table = 'product_order';
}
