<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log; // Import the Log facade

class LanguageMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Use Session facade for reliability
        if (Session::has('locale')) {
            // Retrieve the locale from the session and assign it to the $locale variable
            $locale = Session::get('locale'); 
            
            // Set the application locale using the defined variable
            App::setLocale($locale);

            // Now you can safely use the $locale variable for logging
            Log::info("Locale successfully set to: " . $locale);
        }

        return $next($request);
    }
}
