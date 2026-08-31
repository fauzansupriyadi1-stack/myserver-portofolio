<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CacheResponse
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Cache untuk halaman public (GET requests saja)
        if ($request->isMethod('GET') && $response->isSuccessful()) {
            $response->header('Cache-Control', 'public, max-age=3600, must-revalidate');
            $response->header('Expires', now()->addHour()->toRfc7231String());
        }

        return $response;
    }
}
