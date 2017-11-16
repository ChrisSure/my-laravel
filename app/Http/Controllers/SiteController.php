<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\System\Setting;



class SiteController extends Controller
{
    
    public function index()
    {
    	$setting = Setting::find(1);
    	if ($setting)
    		$this->setMetaTags($setting->title, $setting->description, $setting->keywords);
		return view('welcome');
	}
    
}
