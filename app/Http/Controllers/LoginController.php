<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function authenticate(Request $request){
        //Login Data Validation
        $validator = Validator::make($request->all(),[
            'email' => 'required | email | exists:users,email',
            'g-recaptcha-response' => 'required | recaptcha',
            'password' => 'required'
        ],
        [
            'g-recaptcha-response.required' => 'Please complete the reCAPTCHA.',
        ]
        );

          //Notification Alert Process
          $throttleKey = Str::lower($request->input('email')).'|'.$request->ip();

          if (RateLimiter::tooManyAttempts($throttleKey, 3)) {

              $user = User::where('email', $request->input('email'))->first();

              $token = Str::random(64);

              DB::table('password_reset_tokens')->insert([
                  'email' => $request->email,
                  'token' => $token,
                  'created_at' => Carbon::now(),
              ]);

              if ($user) {

                  Mail::send('emails.failedResetNotification', ['token' => $token], function($message) use ($user) {
                      $message->to($user->email);
                      $message->subject("Login Attempt Notification");
                  });
              }

              return redirect()->route('account.login')->with('error', 'Too many login attempts. Please try again later.');
          }

        if($validator->passes()){
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password] )){
                $user = Auth::user();
                if ($user->is_verified == false) {
                    Auth::logout();
                    return redirect()->route('account.login')->with('error', 'Your account is not verified. Please check your email for verification.');
                }
                RateLimiter::clear($throttleKey);

            return redirect()->route('login.otp');

        } else{

            // Increment the failed attempts
            RateLimiter::hit($throttleKey, 60);

            return redirect()->route('account.login')->with('error','Either email or password is incorrect');
            }
        } else{
            return redirect()->route('account.login')
                             ->withInput()
                             ->withErrors($validator);
        }
    }

    public function register(){
        return view('register');
    }

    public function processRegister(Request $request){
        //Register Data Validation
        $validator = Validator::make($request->all(),[
            'name' => 'required | string',
            'email' => 'required | string | email | unique:users',
            'password_confirmation' => 'required',
            'password' => [
            'required',
            'confirmed',
            'string',
            'min:9',
        ],
            'g-recaptcha-response' => 'required | recaptcha',
            ],
        [
            'password.regex' => 'The password must contain at least one uppercase letter, one lowercase letter, one number and one symbol(_!@#$%^&*()?)',
            'g-recaptcha-response.required' => 'Please complete the reCAPTCHA.',
        ]);

        if($validator->passes()){
                $user = new User();
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                $user->verification_token = Str::random(32);
                $user->is_verified = false;
                $user->role = 'user';
                $user->save();

                // Send verification email
                $verificationLink = route('account.verify', ['token' => $user->verification_token]);
                Mail::send('emails.verification', ['link' => $verificationLink, 'name' => $user->name], function($message) use ($user) {
                    $message->to($user->email);
                    $message->subject("Account Verification");
                });
                return redirect()->route('email.verify')->with('success','Registration completed! Please check your email to verify your account');

        } else{
                return redirect()->route('account.register')
                             ->withInput()
                             ->withErrors($validator);
        }
    }

    //Logout Function
    public function logout(){
        Auth::logout();
        return redirect()->route('account.login');
    }

}
