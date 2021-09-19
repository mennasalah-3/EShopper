<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WishlistProduct extends Model
{
    protected $table='product_wishlist';
    protected $fillable=['wishlist_Id','product_Id'];
}
