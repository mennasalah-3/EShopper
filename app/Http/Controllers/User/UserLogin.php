<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Redirect;
use App\Type;
use App\User;
use App\Cart;
use App\Wishlist;
class UserLogin extends Controller
{
    public function  UserLogin(){
        $types=Type::all();
      return view('user.Userlogin',compact('types'));
    }
    public function authenticate(Request $request){
        request()->validate([
            'email' => 'required',
            'password' => 'required',
            ]);
     
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                // Authentication passed...
                
                return redirect()->intended(route('Shopper') );
            }
           else{
                return Redirect::to(route('login'))->withSuccess('Oppes! You have entered invalid credentials');
        }
    }
    public function register(){
        $types=Type::all();
        return view('user.register',compact('types'));
    }
    public function storeUser(Request $request){
        request()->validate([
           'first_name'=> 'required',
           'last_name'=> 'required',
           'email'=>'required|email',
           'phonenumber'=>'required|min:11',
           'password'=>'required'
        ]);
        $user=User::create([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'phonenumber'=>$request->phonenumber,
            'password'=>Hash::make($request->password)
        ]);
        Cart::create([
            'user_Id'=>$user->id
        ]);
        Wishlist::create([
            'user_Id'=>$user->id
        ]);
        Auth::loginUsingId($user->id);
        return redirect(route('Shopper'));
    }
    public function UserLogout(){
        Auth::guard('web')->logout();

          
        return redirect(route('Shopper'));
    }
}
