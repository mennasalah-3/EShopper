<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
class type extends Model
{
    protected $fillable = ['name'];
    protected $guard='user';
    public function category(){
        return $this->hasMany(Category::class);
    }
}
