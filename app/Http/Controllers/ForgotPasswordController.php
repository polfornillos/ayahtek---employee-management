<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ForgotPasswordController extends Controller
{
    public function forgotpassword(){
        return view('auth.admin-forgotpassword');
    }

    public function forgotpasswordPost(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(length:64);

        Db::table('password_resets')->insert([
            'email'=> $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('emails.admin-forgotpassword', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject("Reset Password");
        });
        
        return back()->with('success', 'We have send an email to reset password.');
    }

    // public function enterSecurityCode(){
    //     return view('auth.admin-entersecuritycode');
    // }

    public function resetPassword($token){
        return view('auth.admin-resetpassword', compact('token'));
    }

    public function resetPasswordPost(Request $request){
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required'
        ]);

        $userEmail = DB::table('password_resets')->where('token', $request->token)->first();

        $updatePassword = DB::table('password_resets')->where([
            'email' => $userEmail->email,
            'token' => $request->token
        ])->first();

        if(!$updatePassword){
            return redirect()->to(route('resetpassword'))->with('error', 'Invalid');
        }

        User::where('email', $userEmail->email)->update(['password' => Hash::make($request->password)]);
        
        DB::table('password_resets')->where(['email' => $userEmail->email])->delete();

        return redirect()->to(route('login'))->with('success', 'Password reset success.');
    }
}
