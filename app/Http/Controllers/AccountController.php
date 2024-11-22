<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function verifyAccount($token) {
        $user = User::where('verification_token', $token)->first();

        if (!$user) {
            return redirect()->route('account.login')->with('error', 'Invalid verification link.');
        }

        $user->is_verified = true;
        $user->verification_token = null;
        $user->save();

        return redirect()->route('account.login')->with('success', 'Your account has been verified. You can now log in.');
    }

    public function emailVerifyIndex(){
        return view('email-verification');
    }
}
