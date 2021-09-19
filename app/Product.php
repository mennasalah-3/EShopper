<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Cart;
use App\Wishlist;
use App\Order;
class Product extends Model
{
    public $timestamps=false;
    protected $fillable=['name','image','price','dicount','qty','category_id'];
    public function category(){
        return $this->belongsTo(category::class);
    }

    public function cart(){
        return $this->belongsToMany(Cart::class);
    }
    public function wishlist(){
        return $this->belongsToMany(Wishlist::class);
    }
    public function order(){
        return $this->belongsToMany(Order::class);
    }
}
