<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\User;

class ForgetPasswordController extends Controller
{
    public function getEmail()
    {

       return view('Admin.forgetPassword.getemail');
    }
    public function postEmail(Request $request)
    {
      $request->validate([
        'email' => 'required|email|exists:users',
    ]);

    $token = Str::random(60);

    DB::table('password_resets')->insert(
        ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
    );

    Mail::send('admin.forgetPassword.verifypassreset',['token' => $token], function($message) use ($request) {
              $message->from('bondokk3011@gmail.com');
              $message->to($request->email);
              $message->subject('Reset Password Notification');
           });

    return redirect('/enterEmail')->with('message', 'We have e-mailed your password reset link!');
}
}
