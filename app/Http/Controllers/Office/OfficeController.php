<?php

namespace App\Http\Controllers\Office;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class OfficeController extends Controller
{
    
    public function index()
    {
    	
		return view('office.home');
	}
    
}
