<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect;
class AdminLoginController extends Controller
{

    public function login(){
        return view('Admin.loginAdmin');
    }
    public function authenticate(Request $request){
        request()->validate([
            'email' => 'required',
            'password' => 'required',
            ]);
     
            $credentials = $request->only('email', 'password');
            if (Auth::guard('admin')->attempt($credentials)) {
                // Authentication passed...
                
                return redirect()->route('adminhome' );
            }
           else{
                return Redirect::to(route('loginAdmin'))->withSuccess('Oppes! You have entered invalid credentials');
        }
    }

    public function loginUser(){
        return view('user.front');
    }

        public function logout(Request $request) {
            Auth::guard('admin')->logout();

          
            return redirect()->route('loginAdmin' );
          }
}
