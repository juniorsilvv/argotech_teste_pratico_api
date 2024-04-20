<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        /**
         * Simulando um JWT.
         * 
         * Adicionado esse middleware só para validar o acesso do app
         */

        $bearerToken = Str::replaceFirst('Bearer ', '', $request->header('authorization'));

        if($bearerToken != 'DEV_TOKEN')
            return response()->json(['error' => 'Unauthenticated'], 401);

        return $next($request);
    }
}
