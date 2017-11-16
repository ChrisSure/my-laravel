<?php

namespace App\Logic\System;

use Validator;
use Illuminate\Validation\Rule;
use App\Entities\System\Security;



class SecurityLogic {
	
	public function logUser($ip)
	{
		if ($res = Security::where(['ip' => $ip])->first()) {
			if ($res->count < 5) {
				$res->count++;
			}
			$res->created_at = time();
			if (!$res->save()) {
				throw new \RuntimeException('Saving error.');
			}
		} else {
			$model = new Security();
			$model->ip = $ip;
			$model->count = 1;
			$model->created_at = time();
			if (!$model->save()) {
				throw new \RuntimeException('Saving error.');
			}
		}
		return true;
	}
	
	
	/**
	* Validator
	*/
    public function validate($input, $security = false)
    {
		$massages = [
				'required' => 'Заповність поле -  :attribute ',
		];
		if ($security) {
			$uniqu = Rule::unique('security')->ignore($security->id);
		} else {
			$uniqu = 'unique:security';
		}
		$validator = Validator::make($input,[
			'ip' => [
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
		$security = new Security();
		$security->count = 5;
		$security->created_at = time();
		$security->ip = $input['ip'];
		if($security->save()) {
			return $security->id;
		}
	}
	
	/**
	* Edit
	*/
	public function edit($input, $security)
	{
		$security->count = 5;
		$security->created_at = time();
		$security->ip = $input['ip'];
		if($security->update()) {
			return true;
		}
	}
	
}

?>