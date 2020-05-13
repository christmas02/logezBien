<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Proprietaire
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = $request->user();
        if (Auth::user()->hasRole('proprietaire')) {
        return $next($request);
        }
        else
        {
            return route('front.index');
        }  
    }
}
