<?php

namespace App;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Admin extends  \Illuminate\Foundation\Auth\User 
 {
    use Notifiable;
    public $timestamps = false;
    protected $guard='admin';
    protected $fillable= ['name','email','password'];
    //
}
