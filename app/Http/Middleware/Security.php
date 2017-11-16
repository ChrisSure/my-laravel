<?php

namespace App\Http\Middleware;

use Closure;
use App\Entities\System\Security as Model;


class Security
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
    	if ($res = Model::where(['ip' => $request->ip()])->first()) {
			 if ($res->count >= 5) {
				return redirect()->route('site')->with('error', 'Ви ввели 5 неправельних спроб, вас заблоковано на 1 годину !');
			}
		}
        return $next($request);
    }
}
