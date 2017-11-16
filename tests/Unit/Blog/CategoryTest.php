<?php

namespace Tests\Unit\Blog;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Logic\Blog\CategoryLogic;
use App\Entities\Blog\Category;



class CategoryTest extends TestCase
{
    private $logic;
    
    
    public function setUp()
    {
    	parent::setUp();
		$this->logic = new CategoryLogic();
	}
	
	public function tearDown()
    {
		Category::where('id', '>', 1)->delete();
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
				'unique:category',
				]
        ];
        
        $data = [
            'name' => 'Category 2',
            'slug' => 'category_2'
        ];
        
        $validation = $this->app['validator']->make($data, $rules);
        $this->assertTrue($validation->passes());
	}
	
	/*
	* Тестування добавлення категорії
	*/
	public function testAdd()
    {
        $this->assertLessThan($this->logic->add(['name' => 'Category 2', 'slug' => 'category_2', 'parent_id' => 0]), 0);
    }
	
	/*
	* Тестування обновлення категорії
	*/
	public function testEdit()
    {
    	$roles = Category::where('id', 1)->first();
        $this->assertTrue($this->logic->edit(['name' => 'Category 1', 'slug' => 'category_1', 'parent_id' => 0], $roles));
    }
	
	
	
}

