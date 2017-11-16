<?php

namespace App\Http\Middleware;

use Closure;
use App\Entities\System\Security;


class Mercy
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
    	$res = Security::where(['count' => 5])->get();
		foreach ($res as $value) {
			if ((time() - $value->created_at) > 3600) {
				$model = Security::find($value->id);
				$model->delete();
			}
		}
        return $next($request);
    }
}
