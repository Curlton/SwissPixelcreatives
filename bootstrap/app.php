<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        
        // --- START: Language Middleware Registration ---
        $middleware->web(append: [
            \App\Http\Middleware\LanguageMiddleware::class,
        ]);
        // --- END: Language Middleware Registration ---

        // 1. Redirect ALREADY logged-in users away from Guest pages
        $middleware->redirectUsersTo(function (Request $request) {
            if ($request->is('admin*')) {
                return route('admin.dashboard');
            }
            return route('dashboard');
        });

        // 2. Redirect UNAUTHENTICATED guests trying to access protected pages
        $middleware->redirectGuestsTo(function (Request $request) {
            if ($request->is('admin*')) {
                return route('admin.login');
            }
            return route('login');
        });
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
