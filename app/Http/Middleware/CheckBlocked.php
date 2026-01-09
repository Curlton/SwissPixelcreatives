<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckBlocked
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 1. Check if the user is currently authenticated
        if (Auth::check()) {
            
            // 2. Check if the user's status is set to 'blocked'
            if (Auth::user()->status === 'blocked') {
                
                // 3. Log the user out of the application
                Auth::logout();

                // 4. Invalidate the session to prevent session fixation/reuse
                $request->session()->invalidate();

                // 5. Regenerate the CSRF token for security
                $request->session()->regenerateToken();

                // 6. Redirect to login with a descriptive error message
                return redirect()->route('login')->withErrors([
                    'login' => 'Your account has been blocked. Please contact the administrator.'
                ]);
            }
        }

        return $next($request);
    }
}