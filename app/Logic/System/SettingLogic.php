<?php

namespace App\Logic\System;

use Validator;
use App\Entities\System\Setting;
use Illuminate\Validation\Rule;


class SettingLogic 
{
	
	/**
	* Get One
	*/
	public function get()
	{
		return Setting::find(1);
	}
	
	
	
	/**
	* Validator
	*/
    public function validate($input)
    {
		$massages = [
				'required' => 'Заповність поле -  :attribute ',
		];
		$validator = Validator::make($input,[
			'title' => 'required|string|max:255',
			'phone' => 'required|string|max:255',
			'address' => 'required|string|max:255',
			'email' => 'required|string|email|max:255',
			'description' => 'required|string',
			'keywords' => 'required|string',
		], $massages);
		return $validator;
	}
	
	
	/**
	* Edit
	*/
	public function edit($input, $setting)
	{
		$setting->fill($input);
		if($setting->update()) {
			return true;
		}
	}
	
}

?>