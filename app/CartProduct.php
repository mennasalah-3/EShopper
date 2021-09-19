<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cart;
class CartProduct extends Model
{
    public $timestamps=false;
    protected $table='cart_product';
    protected $fillable=['cart_Id','product_Id'];

}
