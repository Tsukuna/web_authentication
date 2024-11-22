<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ForgetPasswordController extends Controller
{
    public function forgetPassword(){
        return view('forget-password');
    }

    public function forgetPasswordPost(Request $request){
        $request->validate([
            'email' => "required | email | exists:users",
        ]);

        //Generate an unique token
        $token = Str::random(64);

        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);

        $user = User::where('email', $request->email)->first();
        $userName = $user ? $user->name : 'User'; // Use a fallback name if necessary

        Mail::send('emails.forget-password', ['token' => $token, 'name' => $userName ], function($message) use ($request){
            $message ->  to($request->email);
            $message ->  subject("Reset Password");
        });


        return redirect()->route('forget.password')->with('success','We have sent an email to reset password');

    }

    public function resetPassword($token){
        $emailFetch = DB::table('password_reset_tokens')->where('token', $token)->first();
        $email = $emailFetch->email;
        return view('new-password',compact('token','email'));
    }

    public function resetPasswordPost(Request $request){
        $request->validate([
            'email' => 'required | string | email | exists:users',
            'password_confirmation' => 'required',
            'password' => [
            'required',
            'string',
            'min:8', ]
            ],
        [
            'password.regex' => 'The password must contain at least one uppercase letter, one lowercase letter, one number and one symbol(_!@#$%^&*()?)'
        ]);

        //Reset and Update Password
        $updatedPassword = DB::table('password_reset_tokens')
        ->where([
            'email' => $request->email,
            'token' => $request->token,
        ])->first();

        if(!$updatedPassword){
            return redirect()->route('reset.password')->with('error','Invalid');
        }

        User::where('email',$request->email)->update(['password'=> Hash::make($request->password)]);

        DB::table('password_reset_tokens')->where(['email' => $request->email])->delete();

        return redirect()->route('account.login')->with('reset_success','Password reset successfully');
    }

}
