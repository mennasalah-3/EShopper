<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\User;

class Order extends Model
{

    protected $fillable =['user_Id','total_price','created_at','updated_at'];
    public function product(){
        return $this->belongsToMany(Product::class)->withPivot('quantity');
     }
     public function user(){
        return $this->hasOne(User::class);
     }
}
