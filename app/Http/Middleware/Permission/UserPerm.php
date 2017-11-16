<?php

namespace App\Http\Middleware\Permission;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Entities\Auth\Permission;



class UserPerm
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
    	$permission = Permission::where('name', 'User')->first();
    	$perm = json_decode($user->roles->perm);
    	
        if (!in_array($permission->id, $perm)) {
			return redirect()->route('home')->with('error', 'У вас недостатньо прав !');
		}
    	
        return $next($request);
    }
}
