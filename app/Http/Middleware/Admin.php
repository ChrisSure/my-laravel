<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class Admin
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
    	$user = Auth::user();
        if ($user->id_role < 2) {
			return redirect()->route('site')->with('error', 'В доступі відмовлено !');
		}
    	
        return $next($request);
    }
}
