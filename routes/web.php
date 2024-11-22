<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OtpController;
use App\Http\Middleware\AdminMiddleWare;
use App\Http\Middleware\RedirectIfAuthenticatedByRole;
use App\Http\Middleware\UserMiddleWare;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('account.login');
});

Route::get('email-verify-index', [AccountController::class, 'emailVerifyIndex'])->name('email.verify');

Route::get('verify-account/{token}', [AccountController::class, 'verifyAccount'])->name('account.verify');


Route::group(['middleware' => 'auth'],function(){
    Route::get('login-with-otp',[OtpController::class,'loginOtp'])->name('login.otp');
    Route::post('login-with-otp-post',[OtpController::class,'loginWithOtpPost'])->name('login.otp.post');

});


Route::prefix('account')->group(function () {

Route::group(['middleware' => 'guest'],function(){

    Route::get('login',[LoginController::class,'index'])->name('account.login');
    Route::get('register',[LoginController::class,'register'])->name('account.register');
    Route::post('process-register',[LoginController::class,'processRegister'])->name('account.processRegister');
    Route::post('authenticate',[LoginController::class,'authenticate'])->name('account.authenticate');
    });

    Route::group(['middleware' => 'auth','OTP'],function(){
        Route::get('logout',[LoginController::class,'logout'])->name('account.logout');
        Route::get('home',[HomeController::class,'index'])->name('account.home')->middleware(UserMiddleWare::class);
        Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard.home')->middleware(AdminMiddleWare::class);

    });



});




Route::get('forget-password',[ForgetPasswordController::class,'forgetPassword'])->name('forget.password');
Route::post('forget-password-post',[ForgetPasswordController::class,'forgetPasswordPost'])->name('forget.password.post');

Route::get('reset-password/{token}',[ForgetPasswordController::class,'resetPassword'])->name('reset.password');
Route::post('reset-password-post',[ForgetPasswordController::class,'resetPasswordPost'])->name('reset.password.post');











