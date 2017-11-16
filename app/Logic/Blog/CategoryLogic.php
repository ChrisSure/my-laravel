<?php

namespace App\Logic\Blog;

use Validator;
use App\Entities\Blog\Category;
use Illuminate\Validation\Rule;


class CategoryLogic 
{
	
	/**
	* Validator
	*/
    public function validate($input, $category = false)
    {
		$massages = [
				'required' => 'Заповність поле -  :attribute ',
		];
		if ($category) {
			$uniqu = Rule::unique('category')->ignore($category->id);
		} else {
			$uniqu = 'unique:category';
		}
		$validator = Validator::make($input,[
			'name' => 'required|string|max:255',
			'slug' => [
				'required',
				'string',
				'max:255',
				$uniqu,
				],
		], $massages);
		return $validator;
	}
	
	
	/**
	* Add
	*/
	public function add($input)
	{
		$category = new Category();
		$category->fill($input);
		$save = ($input['parent_id'] === 0) ? $category->makeRoot()->save() : $category->save();
		if($save) {
			return $category->id;
		}
	}
	
	
	/**
	* Edit
	*/
	public function edit($input, $category)
	{
		$category->fill($input);
		$save = ($input['parent_id'] === 0) ? $category->makeRoot()->save() : $category->update();
		if($save) {
			return true;
		}
	}
	
	
	/**
	* Sorting
	*/
	public function up($id)
	{
		$category = Category::find($id);
		return $bool = $category->up();
	}
	
	public function down($id)
	{
		$category = Category::find($id);
		return $bool = $category->down();
	}
	/**
	* Sorting
	*/
	
	
}

?>