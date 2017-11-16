<?php

namespace App\Logic\Auth;

use Validator;
use Illuminate\Validation\Rule;
use App\Entities\Auth\Roles;



class RolesLogic {
	
	
	/**
	* Validator
	*/
    public function validate($input, $roles = false)
    {
		$massages = [
				'required' => 'Заповність поле -  :attribute ',
		];
		if ($roles) {
			$uniqu = Rule::unique('roles')->ignore($roles->id);
		} else {
			$uniqu = 'unique:roles';
		}
		$validator = Validator::make($input,[
			'name' => [
				'required',
				'string',
				'max:255',
				$uniqu,
				],
		], $massages);
		return $validator;
	}
	
	
	/**
	* Add
	*/
	public function add($input)
	{
		$roles = new Roles();
		$roles->created_at = date('Y-m-d H:i:s');
		$roles->fill($input);
		if($roles->save()) {
			return $roles->id;
		}
	}
	
	/**
	* Edit
	*/
	public function edit($input, $roles)
	{
		$roles->updated_at = date('Y-m-d H:i:s');
		$roles->fill($input);
		if($roles->update()) {
			return true;
		}
	}
	
	
	/**
	* List for select
	*/
	public function listRoles()
	{
		$res = Roles::get();
		$res = $res->toArray();
		foreach($res as $value) {
			$arr[$value['id']] = $value['name'];
		}
		return $arr;
	}
	
	/**
	* List all
	*/
	public static function listAllId()
	{
		$res = Roles::get();
		$res = $res->toArray();
		foreach($res as $value) {
			$arr[] = $value['id'];
		}
		return $arr;
	}
	
	
}

?>