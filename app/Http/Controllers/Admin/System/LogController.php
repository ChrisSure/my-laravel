<?php

namespace App\Http\Controllers\Admin\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use LogReader;


class LogController extends Controller
{
	
	
	public function view()
	{
		$logs = LogReader::get();
		return view('admin.system.log', ['logs' => $logs]); 
	}
	
	public function clear()
	{
		if ($deleted = LogReader::delete()) {
			return redirect()->route('log')->with('success', 'Логи очищені ('. $deleted .' шт)');;
		}
	}
	
	
}
