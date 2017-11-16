<?php

namespace Tests\Unit\System;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Logic\System\SecurityLogic;
use App\Entities\System\Security;



class SecurityTest extends TestCase
{
    private $logic;
    
    
    public function setUp()
    {
    	parent::setUp();
		$this->logic = new SecurityLogic();
	}
	
	public function tearDown()
    {
		Security::where('id', '>', 1)->delete();
	}
	
	/**
	* Тест на валідацію форми
	*/
	public function testValidation()
    {
		$rules = [
            'ip' => [
				'required',
				'string',
				'max:255',
				'unique:security',
			]
        ];
        
        $data = [
            'ip' => '127.0.0.8',
        ];
        
        $validation = $this->app['validator']->make($data, $rules);
        $this->assertTrue($validation->passes());
	}
	
	/*
	* Тестування добавлення ip
	*/
	public function testAdd()
    {
        $this->assertLessThan($this->logic->add(['ip' => '127.0.0.8']), 0);
    }
	
	/*
	* Тестування обновлення ip
	*/
	public function testEdit()
    {
    	$roles = Security::where('id', 1)->first();
        $this->assertTrue($this->logic->edit(['ip' => '127.0.0.9'], $roles));
    }
	
	/*
	* Тестування додавання автоматичного блокування ip
	*/
	public function testlogUser()
    {
        $this->assertTrue($this->logic->logUser('127.0.0.8'));
    }
	
	
}

