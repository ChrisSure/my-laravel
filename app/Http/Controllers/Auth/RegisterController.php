<?php

namespace App\Http\Controllers\Auth;

use App\Entities\Auth\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Mail;
use Log;
use App\Mail\RegisterConfirm;



class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
	
	public function showRegistrationForm()
    {
        return view('auth.register');
    }
	
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:3|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'remember_token' => Str::random(60),
        ]);
    }
    
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        $user = $this->create($request->all());
		
       	Mail::to($user->email)->send(new RegisterConfirm($user));
		
		return redirect()->route('site')->with('success', 'На ваш email вислані подальші інструкції !');
    }

    
    
    public function confirm(Request $request, $id, $token)
    {
    	$user = User::find($id);
    	if ($token != $user->remember_token) {
			Log::info('Невірний токен');
    		abort(404, 'Token failed');
		}
    	$user->status = 1;
    	$user->save();
        $this->guard()->login($user);
        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath())->with('success', 'Поздоровляємо ви успішно зареєструвались на сайті !');
	}
	
}
