<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Admin;
use App\Http\Requests\AdminRequest;
use Illuminate\Support\Facades\Crypt;
class AdminController extends Controller
{
  public function __construct(){
    $this->middleware( 'auth:admin');
  }
    public function index(){
      return view('Admin.home');
       
    }
    public function editProfile(){
      return view('Admin.updateProfile');
    }

    public function saveUpdates(Request $request, $id){
      $this->validate($request, [
        'name' =>'required|min:2',
        'email'=>'required|email'
      ]);
      $admin=Admin::find($id);
      $admin->update([
         'name' => $request->name,
         'email' => $request->email
       ]);
        return redirect(route('adminhome')); 
        
    }

    public function changePassword(){
      return view('Admin.changePassword');
    }
    
    public function updatePassword(Request $request,$id){
      
      $this->validate($request, [
 
        'current_password' => 'required',
        'new_password' => 'required|min:6',
        'confirm_new_password' => 'required_with:new_password|same:new_password'
        ]);
        $hashedPassword=Auth::guard('admin')->user()->password;
        if(\Hash::check($request->current_password,$hashedPassword)){
           if(! \Hash::check($request->new_password,$hashedPassword)){
              
                $admin=Admin::find($id);
                $admin->password=bcrypt($request->new_password);
                $admin->update();
                return redirect(route('adminlogout'));
             
           }
           else{
        
            return redirect(route('changePassword',Auth::guard('admin')->user()->id));
          }

        }
 
    
      }
  }
