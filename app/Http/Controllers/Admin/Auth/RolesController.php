<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Logic\Auth\RolesLogic;
use App\Entities\Auth\Roles;
use App\Entities\Auth\Permission;
use DB;
use Log;



class RolesController extends Controller
{
	
	private $perms;
	
	
    public function index(Request $request)
    {	 
    	$query = DB::table('roles');
		if ($request->input('name')) {
			$query->where('name', 'like', '%' . $request->input('name') . '%');
		}
		$roles = $query->get();
		$name = ($request->input('name')) ? '?name=' . $request->input('name') : '';
		return view('admin.auth.roles.index', ['roles' => $roles, 'name' => $name]);
	}
	
	
	public function view($id)
	{
		if (!$role = Roles::where(['id' => $id])->first()) {
			Log::info('Незнайдено ip-сторінку !');
			abort(404, 'Незнайдено сторінку !');
		}
		if ($role->perm) {
			$perms = Permission::whereIn('id', json_decode($role->perm))->get();
		} else {
			$perms = [];
		}
		return view('admin.auth.roles.view', ['role' => $role, 'perms' => $perms]); 
	}
	
	
	public function add(Request $request, RolesLogic $logic)
	{
		if ($request->isMethod('post')) {
			$input = $request->except('_token', '_url');
			$input['perm'] = (isset($input['perm'])) ? json_encode($input['perm']) : null;
			$validator = $logic->validate($input);
			if ($validator->fails()) {
				return redirect()->route('rolesAdd')->withErrors($validator)->withInput();
			}
			if ($send = $logic->add($input)) {
				return redirect()->route('rolesView', ['id' => $send])->with('success', 'Роль добавлено');
			}
		}
		return view('admin.auth.roles.add', ['perms' => $this->getPerms()]);
	}
	
	
	public function edit(Request $request, RolesLogic $logic, Roles $roles)
	{
		if ($request->isMethod('post')) {
			$input = $request->except('_token', '_url');
			$input['perm'] = (isset($input['perm'])) ? json_encode($input['perm']) : null;
			$validator = $logic->validate($input, $roles);
			if ($validator->fails()) {
				return redirect()->route('rolesEdit', ['id' => $roles])->withErrors($validator)->withInput();
			}
			if ($logic->edit($input, $roles)){
				return redirect()->route('rolesView', ['id' => $roles->id])->with('success', 'Роль обновлено');
			}
		}
		return view('admin.auth.roles.update', ['roles' => $roles->toArray(), 'perms' => $this->getPerms()]);
	}
	
	
	public function delete($id)
	{
		$perm = Roles::find($id);
		if ($perm->delete()) {
			return redirect()->route('rolesIndex')->with('success', 'Роль видалено');
		}
	}
	
	
	public function getPerms()
	{
		if ($this->perms === null) {
			return Permission::get();
		}
		return $this->perms;
	}
	
}
