<?php

namespace App\Logic\Auth;

use Validator;
use Illuminate\Validation\Rule;
use App\Entities\Auth\Permission;



class PermissionLogic {
	
	
	/**
	* Validator
	*/
    public function validate($input, $perm = false)
    {
		$massages = [
				'required' => 'Заповність поле -  :attribute ',
		];
		if ($perm) {
			$uniqu = Rule::unique('permission')->ignore($perm->id);
		} else {
			$uniqu = 'unique:permission';
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
		$perm = new Permission();
		$perm->created_at = date('Y-m-d H:i:s');
		$perm->fill($input);
		if($perm->save()) {
			return $perm->id;
		}
	}
	
	/**
	* Edit
	*/
	public function edit($input, $perm)
	{
		$perm->updated_at = date('Y-m-d H:i:s');
		$perm->fill($input);
		if($perm->update()) {
			return true;
		}
	}
	
}

?>