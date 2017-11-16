<?php

namespace App\Http\Controllers\Admin\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Logic\System\SecurityLogic;
use App\Entities\System\Security;
use DB;
use Log;



class SecurityController extends Controller
{
	
    public function index(Request $request)
    {	 
    	$query = DB::table('security');
		if ($request->input('ip')) {
			$query->where('ip', 'like', '%' . $request->input('ip') . '%');
		}
		$security = $query->paginate(20);
		$ip = ($request->input('ip')) ? '?ip=' . $request->input('ip') : '';
		return view('admin.system.security.index', ['security' => $security, 'ip' => $ip]);
	}
	
	
	public function view($id)
	{
		if (!$security = Security::where(['id' => $id])->first()) {
			Log::info('Незнайдено ip-сторінку !');
			abort(404, 'Незнайдено сторінку !');
		}
		return view('admin.system.security.view', ['security' => $security]); 
	}
	
	
	public function add(Request $request, SecurityLogic $logic)
	{
		if ($request->isMethod('post')) {
			$input = $request->except('_token', '_url');
			$validator = $logic->validate($input);
			if ($validator->fails()) {
				return redirect()->route('securityAdd')->withErrors($validator)->withInput();
			}
			if ($send = $logic->add($input)) {
				return redirect()->route('securityView', ['id' => $send])->with('success', 'Ip для блокування добавлено');
			}
		}	
		return view('admin.system.security.add');
	}
	
	
	public function edit(Request $request, SecurityLogic $logic, Security $security)
	{
		if ($request->isMethod('post')) {
			$input = $request->except('_token', '_url');
			$validator = $logic->validate($input, $security);
			if ($validator->fails()) {
				return redirect()->route('securityEdit', ['id' => $security])->withErrors($validator)->withInput();
			}
			if ($logic->edit($input, $security)){
				return redirect()->route('securityView', ['id' => $security->id])->with('success', 'Ip для блокування обновлено');
			}
		}
		return view('admin.system.security.update', ['security' => $security->toArray()]);
	}
	
	
	public function delete($id)
	{
		$security = Security::find($id);
		if ($security->delete()) {
			return redirect()->route('securityIndex')->with('success', 'IP видалено');
		}
	}
	
}
