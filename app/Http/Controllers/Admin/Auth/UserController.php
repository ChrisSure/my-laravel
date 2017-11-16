<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Logic\Auth\UserLogic;
use App\Logic\Auth\RolesLogic;
use App\Entities\Auth\User;
use App\Entities\Auth\Roles;
use Log;



class UserController extends Controller
{
    
    public function index(Request $request, UserLogic $logic, $status = false, $role = false)
    {	
    	$result = $logic->indexSort($status, $role, $request->input('name'));
    	$roles = Roles::get();
		return view('admin.auth.user.index', ['users' => $result[0], 'status' => $result[1], 'role' => $result[2], 'name' => $result[3], 'roles' => $roles]);
	}
	
	
	public function view($id)
	{
		if (!$user = User::where(['id'=>$id])->first()) {
			Log::info('Незнайдено користувача !');
			abort(404, 'Незнайдено користувача !');
		}
		return view('admin.auth.user.view', ['user' => $user]); 
	}
	
	
	public function add(Request $request, UserLogic $logic, RolesLogic $roles_logic)
	{
		if ($request->isMethod('post')) {
			$input = $request->except('_token', '_url');
			$validator = $logic->validate($input);
			if ($validator->fails()) {
				return redirect()->route('userAdd')->withErrors($validator)->withInput();
			}
			if ($send = $logic->add($input)) {
				return redirect()->route('userView', ['id' => $send])->with('success', 'Користувач добавлений');
			}
		}
		$roles = $roles_logic->listRoles();
		return view('admin.auth.user.add', ['roles' => $roles]);
	}
	
	
	public function edit(Request $request, UserLogic $logic, RolesLogic $roles_logic, User $user)
	{
		if ($request->isMethod('post')) {
			$input = $request->except('_token', '_url');
			$validator = $logic->validate_update($input, $user);
			if ($validator->fails()) {
				return redirect()->route('userEdit', ['id' => $user])->withErrors($validator)->withInput();
			}
			if ($logic->edit($input, $user)){
				return redirect()->route('userView', ['id' => $user->id])->with('success', 'Користувач обновлений');
			}
		}
		$roles = $roles_logic->listRoles();
		return view('admin.auth.user.update', ['user' => $user->toArray(), 'roles' => $roles]);
	}
	
	
	public function password(Request $request, UserLogic $logic, User $user){
		if ($request->isMethod('post')) {
			$input = $request->except('_token', '_url');
			$validator = $logic->validate_password($input);
			if ($validator->fails()) {
				return redirect()->route('userPassword', ['id' => $user])->withErrors($validator)->withInput();
			}
			if ($logic->edit_password($input, $user)) {
				return redirect()->route('userView', ['id' => $user->id])->with('success', 'Пароль змінено');
			}
		}
		return view('admin.auth.user.password', ['one' => $user->toArray()]);
	}
	
	
	public function delete($id)
	{
		$user = User::find($id);
		if ($user->delete()) {
			return redirect()->route('userIndex')->with('success', 'Користувач видалений');
		}
	}
	
	
    
}
