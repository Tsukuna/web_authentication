<?php

use App\Http\Middleware\OtpAuthenticator;
use App\Http\Middleware\RedirectIfAuthenticatedByRole;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {

        $middleware->appendToGroup('OTP',[
            OtpAuthenticator::class,
        ]);

        $middleware->redirectTo(
            guests:'/account/login',
            users:'/account/dashboard',
        );
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();