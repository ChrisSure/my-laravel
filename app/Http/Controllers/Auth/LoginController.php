<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Log;
use App\Entities\Auth\User;
use App\Logic\System\SecurityLogic;


class LoginController extends Controller
{
	
    public function showLoginForm()
    {
        return view('auth.login');
    }
    
    public function login(Request $request, SecurityLogic $logic)
    {
    	$res = $request->only('email', 'password');
    	
	    if (Auth::attempt(['email' => $res['email'], 'password' => $res['password'], 'status' => 1])) {
	    	$user = User::where(['email' => $res['email']])->first();
	    	if ($user->id_role == 1) {
				return redirect()->route('office');
			} else {
				return redirect()->route('home');
			}
	    } else {
	    	Log::info('Спроба входу з неправельним логіном або паролем');
	    	$logic->logUser($request->ip());
			return redirect()->route('login')->with('error', 'Неправельний логін або пароль !');
		}
	}
	
	public function logout()
	{
		Auth::logout();
		return redirect()->route('home');
	}
	
	
    
}
