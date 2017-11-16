<?php

namespace Tests\Unit\Auth;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Validation\Rule;
use App\Logic\Auth\UserLogic;
use App\Entities\Auth\User;



class UserTest extends TestCase
{
   	private $logic;
    
    
    public function setUp()
    {
    	parent::setUp();
		$this->logic = new UserLogic();
	}
	
	public function tearDown()
    {
		User::where('id','>',1)->delete();
	}
	
	/**
	* Тест на валідацію форми добавлення
	*/
	public function testValidationCreate()
    {
		$rules = [
            'name' => ['required', 'max:255'],
			'email' => ['required', 'unique:users', 'max:255', 'email'],
			'password' => ['required','max:255'],
        ];
        
        $data = [
            'name' => 'Roman',
            'email' => 'r@r.ua',
            'password' => '123'
        ];
        
        $validation = $this->app['validator']->make($data, $rules);
        $this->assertTrue($validation->passes());
	}
	
	/**
	* Тест на валідацію форми обновлення
	*/
	public function testValidationUpdate()
    {
		$rules = [
            'name' => 'required|max:255',
			'email' => [
		        'required', 'email',
		        Rule::unique('users')->ignore(1),
		    ],
		];
        $data = [
            'name' => 'Taras',
            'email' => 't@t.ua'
        ];
        
        $validation = $this->app['validator']->make($data, $rules);
        $this->assertTrue($validation->passes());
	}
	
	/**
	* Тест на валідацію форми обновлення пароля
	*/
	public function testValidationPassword()
    {
		$rules = [
            'password' => 'required|max:255',
        ];
        
        $data = [
            'password' => '123'
        ];
        
        $validation = $this->app['validator']->make($data, $rules);
        $this->assertTrue($validation->passes());
	}
	
	/*
	* Тестування добавлення користувача
	*/
	public function testAdd()
    {
        $this->assertLessThan($this->logic->add(['name' => 'Roman', 'email' => 'r@r.ua', 'password' => '123']), 0);
    }
	
	/*
	* Тестування обновлення користувача
	*/
	public function testEdit()
    {
    	$user = User::where('id', 1)->first();
        $this->assertTrue($this->logic->edit(['name' => 'Taras', 'email' => 't@t.ua'], $user));
    }
	
	
	
	
}
