<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;

class UserTokenIsInRequest
{
    public function handle(Request $request, Closure $next)
    {
        $token = NULL;

        if (!empty($request->header('token')))
        {
            $token = $request->header('token');
        }
        else
        {
            if (!empty($request->token))
            {
                $token = $request->token;
            }
            else return $next($request);
        }

        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', "Bearer $token");

        return $next($request);
    }
}
