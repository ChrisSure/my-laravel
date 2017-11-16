<?php

namespace Tests\Unit\Auth;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Logic\Auth\RolesLogic;
use App\Entities\Auth\Roles;



class RolesTest extends TestCase
{
    
    private $logic;
    
    
    public function setUp()
    {
    	parent::setUp();
		$this->logic = new RolesLogic();
	}
    
    
    public function tearDown()
    {
		Roles::where('id','>',2)->delete();
	}
    
    /**
	* Тест на валідацію форми
	*/
   	public function testValidation()
    {
		$rules = [
            'name' => ['required', 'string', 'max:255', 'unique:roles']
        ];
        
        $data = [
            'name' => 'Admin22',
            'description' => 'Description'
        ];
        
        $validation = $this->app['validator']->make($data, $rules);
        $this->assertTrue($validation->passes());
	}
	
	/*
	* Тестування добавлення ролі
	*/
	public function testAdd()
    {
        $this->assertLessThan($this->logic->add(['name' => 'Admin2', 'description' => 'Роль admin2', json_encode(["1"])]), 0);
    }
	
	/*
	* Тестування обновлення ролі
	*/
	public function testEdit()
    {
    	$roles = Roles::where('id', 1)->first();
        $this->assertTrue($this->logic->edit(['name' => 'User', 'description' => 'Роль admin'], $roles));
    }
	
	
	
	
	
}
