<?php

namespace App\Http\Controllers\Admin\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



class InfoController extends Controller
{
	
	
	public function view()
	{
		
		return view('admin.system.info'); 
	}
	
	
}
