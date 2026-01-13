<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SiteLock
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Define your credentials here
        $authUser = 'SwissP'; 
        $authPass = 'SwissP';

        // Check if the user has provided the correct credentials via the browser popup
        if ($request->getUser() !== $authUser || $request->getPassword() !== $authPass) {
            
            // This header is what triggers the username/password box in the browser
            return response('Unauthorized.', 401, [
                'WWW-Authenticate' => 'Basic realm="SwissPixel Secure Area"',
                'Content-Type' => 'text/plain',
            ]);
        }

        return $next($request);
    }
}