<?php

namespace Tests\Unit\Blog;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Logic\Blog\PagesLogic;
use App\Entities\Blog\Pages;



class PagesTest extends TestCase
{
    private $logic;
    
    
    public function setUp()
    {
    	parent::setUp();
		$this->logic = new PagesLogic();
	}
	
	public function tearDown()
    {
		Pages::where('id', '>', 1)->delete();
	}
	
	/**
	* Тест на валідацію форми
	*/
	public function testValidation()
    {
		$rules = [
            'name' => 'required|string|max:255',
			'slug' => [
				'required',
				'string',
				'max:255',
				'unique:pages',
				]
        ];
        
        $data = [
            'name' => 'Pages 1',
            'slug' => 'page_1'
        ];
        
        $validation = $this->app['validator']->make($data, $rules);
        $this->assertTrue($validation->passes());
	}
	
	/*
	* Тестування добавлення сторінки
	*/
	public function testAdd()
    {
        $this->assertLessThan($this->logic->add(['name' => 'Page_1', 'slug' => 'page_1']), 0);
    }
	
	/*
	* Тестування обновлення сторінки
	*/
	public function testEdit()
    {
    	$roles = Pages::where('id', 1)->first();
        $this->assertTrue($this->logic->edit(['name' => 'About', 'slug' => 'about'], $roles));
    }
	
	
	
}
