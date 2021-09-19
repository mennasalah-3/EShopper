<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Product;
class Cart extends Model
{
   public $timestamps=false;
    protected $fillable=['user_Id'];
    public function user(){
        return $this->hasOne(User::class);
     }
     public function product(){
        return $this->belongsToMany(Product::class)->withPivot('quantity');
     }
}
