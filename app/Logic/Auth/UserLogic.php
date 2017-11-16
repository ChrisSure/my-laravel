<?php

namespace App\Logic\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Entities\Auth\User;
use DB;
use Validator;
use App\Logic\Auth\RolesLogic;



class UserLogic {
	
	/**
	* Validator
	*/
    public function validate($input){
		$massages = [
			'required' => 'Заповність поле -  :attribute ',
			'unique' => 'Поле email вже занято',
		];
		$validator = Validator::make($input,[
			'name' => 'required|max:255',
			'email' => 'required|unique:users|max:255|email',
			'password' => 'required|max:255',
		], $massages);
		return $validator;
	}
    
    /**
	* Validator update
	*/
    public function validate_update($input, $user){
		$massages = [
			'required' => 'Заповність поле -  :attribute ',
			'unique' => 'Поле email вже занято',
		];
		$validator = Validator::make($input,[
			'name' => 'required|max:255',
			'email' => [
		        'required', 'email',
		        Rule::unique('users')->ignore($user->id),
		    ],
		], $massages);
		return $validator;
	}
	
	/**
	* Validator password
	*/
    public function validate_password($input){
		$massages = [
			'required' => 'Заповність поле -  :attribute ',
		];
		$validator = Validator::make($input,[
			'password' => 'required|max:255',
		], $massages);
		return $validator;
	}
    
    
    /**
	* Add
	*/
	public function add($input){
		$user = new User();
		$user->fill($input);
		$user->password = Hash::make($input['password']);
		if ($user->save()) {
			return $user->id;
		}
	}
	
	
	/**
	* Edit
	*/
	public function edit($input, $user){
		$user->fill($input);
		if ($user->update()) {
			return true;
		}
	}
	
	
	/**
	* Edit password
	*/
	public function edit_password($input, $user){
		$user->password = Hash::make($input['password']);
		if ($user->update()) {
			return true;
		}
	}
	
	/**
	* Метод проводить виборку по параметрам
	* @param int $status
	* @param int $role
	* @param string $name
	* 
	* @return array
	*/
	public function indexSort($status, $role, $name)
	{
		$query = User::where('id', '>', 0);
    	if ($status) {
    		if ($status == 1) {
				$query->where('status', 1);
			} elseif ($status == 2) {
				$query->where('status', 0);
			} else {
				$query->whereIn('status', [0, 1]);
			}
		}
		if (!$status) $status = 3;
		
		if ($role) {
			if ($role == -1) {
				$list = RolesLogic::listAllId();
				$query->whereIn('id_role', $list);
			} else {
				$query->where('id_role', $role);
			}
		}
		if (!$role) $role = -1;
		
		if ($name) {
			$query = User::where('name', 'like', '%' . $name . '%');
		}
		$name = ($name) ? '?name=' . $name : '';
		
		$users = $query->paginate(20);
		
		return [$users, $status, $role, $name];
	}
	
	
	
}

?>