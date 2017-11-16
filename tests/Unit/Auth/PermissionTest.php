<?php

namespace Tests\Unit\Auth;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Logic\Auth\PermissionLogic;
use App\Entities\Auth\Permission;



class PermissionTest extends TestCase
{
    
    private $logic;
    
    
    public function setUp()
    {
    	parent::setUp();
		$this->logic = new PermissionLogic();
	}
    
    
    public function tearDown()
    {
		Permission::where('id', '>', 4)->delete();
	}
    
    /**
	* Тест на валідацію форми
	*/
    public function testValidation()
    {
		$rules = [
            'name' => ['required', 'string', 'max:255', 'unique:permission']
        ];
        
        $data = [
            'name' => 'Admin22',
            'description' => 'Description'
        ];
        
        $validation = $this->app['validator']->make($data, $rules);
        $this->assertTrue($validation->passes());
	}
    
    /*
	* Тестування добавлення дозволу
	*/
    public function testAdd()
    {
        $this->assertLessThan($this->logic->add(['name' => 'Admin', 'description' => 'Роль admin']), 0);
    }
    
    /*
	* Тестування обновлення дозволу
	*/
    public function testEdit()
    {
    	$perm = Permission::where('id', 1)->first();
        $this->assertTrue($this->logic->edit(['name' => 'Pages', 'description2' => 'Роль admin'], $perm));
    }
    
    
}
