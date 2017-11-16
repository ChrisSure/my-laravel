<?php

namespace App\Http\Controllers\Admin\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cache;


class CacheController extends Controller
{
	
	
	public function view()
	{
		return view('admin.system.cache'); 
	}
	
	public function clear()
	{
		if (Cache::flush()) {
			return redirect()->route('cache')->with('success', 'Кеш очищений !');
		}
	}
	
	
}
