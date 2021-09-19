<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Cart;
use App\Order;
class User extends Authenticatable
{
    use Notifiable;
    protected $guard='web';
    public function cart(){
        return $this->hasOne(Cart::class);
     }
     public function order(){
        return $this->hasMany(Order::class);
     }
     public function wishlist(){
        return $this->hasOne(Wishlist::class);
     }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name','phonenumber', 'email', 'password',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
