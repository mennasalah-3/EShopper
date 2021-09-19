<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
class Category extends Model
{
  protected $table="categories";
  public $timestamps=false;
  protected $fillable=['name','type_id'];
  public function products(){
     return $this->hasMany(Product::class);
  }
  public function type(){
    return $this->belongsTo(Type::class);

  }
}
