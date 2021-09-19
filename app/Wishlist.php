<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    public $timestamps = false;
    protected $table='wishlist';
    protected $fillable=['user_Id','product_Id'];
     public function user(){
        return $this->hasOne(User::class);
     }
     public function product(){
      return $this->belongsToMany(Product::class);
   }
}
