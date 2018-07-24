<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class MasterMiddleware
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
        if (Auth::user()->is_master) {
            return $next($request);    
        }
        $message = 'No tienes privilegios para entrar en esta sección';
        return redirect()->route('home')->with('error', $message);
    }
}
