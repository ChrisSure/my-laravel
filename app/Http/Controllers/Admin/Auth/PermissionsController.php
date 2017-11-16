<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Logic\Auth\PermissionLogic;
use App\Entities\Auth\Permission;
use DB;
use Log;



class PermissionsController extends Controller
{
	
    public function index(Request $request)
    {	 
    	$query = DB::table('permission');
		if ($request->input('name')) {
			$query->where('name', 'like', '%' . $request->input('name') . '%');
		}
		$perms = $query->paginate(20);
		$name = ($request->input('name')) ? '?name=' . $request->input('name') : '';
		return view('admin.auth.perm.index', ['perms' => $perms, 'name' => $name]);
	}
	
	
	public function view($id)
	{
		if (!$perm = Permission::where(['id' => $id])->first()) {
			Log::info('Незнайдено ip-сторінку !');
			abort(404, 'Незнайдено сторінку !');
		}
		return view('admin.auth.perm.view', ['perm' => $perm]); 
	}
	
	
	public function add(Request $request, PermissionLogic $logic)
	{
		if ($request->isMethod('post')) {
			$input = $request->except('_token', '_url');
			$validator = $logic->validate($input);
			if ($validator->fails()) {
				return redirect()->route('permAdd')->withErrors($validator)->withInput();
			}
			if ($send = $logic->add($input)) {
				return redirect()->route('permView', ['id' => $send])->with('success', 'Дозвіл добавлено');
			}
		}	
		return view('admin.auth.perm.add');
	}
	
	
	public function edit(Request $request, PermissionLogic $logic, Permission $perm)
	{
		if ($request->isMethod('post')) {
			$input = $request->except('_token', '_url');
			$validator = $logic->validate($input, $perm);
			if ($validator->fails()) {
				return redirect()->route('permEdit', ['id' => $perm])->withErrors($validator)->withInput();
			}
			if ($logic->edit($input, $perm)){
				return redirect()->route('permView', ['id' => $perm->id])->with('success', 'Дозвіл обновлено');
			}
		}
		return view('admin.auth.perm.update', ['perm' => $perm->toArray()]);
	}
	
	
	public function delete($id)
	{
		$perm = Permission::find($id);
		if ($perm->delete()) {
			return redirect()->route('permIndex')->with('success', 'Дозвіл видалено');
		}
	}
	
}
