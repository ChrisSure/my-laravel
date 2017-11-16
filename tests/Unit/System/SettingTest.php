<?php

namespace Tests\Unit\System;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Logic\System\SettingLogic;
use App\Entities\System\Setting;



class SettingTest extends TestCase
{
    private $logic;
    
    
    public function setUp()
    {
    	parent::setUp();
		$this->logic = new SettingLogic();
	}
	
	/**
	* Тест на валідацію форми
	*/
	public function testValidation()
    {
		$rules = [
            'title' => 'required|string|max:255',
			'phone' => 'required|string|max:255',
			'address' => 'required|string|max:255',
			'email' => 'required|string|email|max:255',
			'description' => 'required|string',
			'keywords' => 'required|string',
        ];
        
        $data = [
            'title' => 'Site title',
            'description' => 'Site description',
            'keywords' => 'Site keywords',
            'address' => 'Site address',
            'email' => 'site@gmail.com',
            'phone' => 'Site phone',
        ];
        
        $validation = $this->app['validator']->make($data, $rules);
        $this->assertTrue($validation->passes());
	}
	
	/*
	* Тестування обновлення настройок сайту
	*/
	public function testEdit()
    {
    	$roles = Setting::where('id', 1)->first();
        $this->assertTrue($this->logic->edit(['title' => 'title'], $roles));
    }
	
}


