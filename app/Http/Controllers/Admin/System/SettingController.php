<?php

namespace App\Http\Controllers\Admin\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Logic\System\SettingLogic;


class SettingController extends Controller
{
	
	
	public function view(Request $request, SettingLogic $logic)
	{
		$setting = $logic->get();
		if ($request->isMethod('post')) {
			$input = $request->except('_token', '_url');
			$validator = $logic->validate($input, $setting);
			if ($validator->fails()) {
				return redirect()->route('setting')->withErrors($validator)->withInput();
			}
			if ($logic->edit($input, $setting)){
				return redirect()->route('setting')->with('success', 'Настройки обновлені');
			}
		}
		return view('admin.system.setting', ['setting' => $setting]); 
	}
	
	
}