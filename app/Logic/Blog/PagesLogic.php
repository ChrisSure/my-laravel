<?php

namespace App\Logic\Blog;

use Validator;
use App\Entities\Blog\Pages;
use Illuminate\Validation\Rule;


class PagesLogic 
{
	
	/**
	* Validator
	*/
    public function validate($input, $pages = false)
    {
		$massages = [
				'required' => 'Заповність поле -  :attribute ',
		];
		if ($pages) {
			$uniqu = Rule::unique('pages')->ignore($pages->id);
		} else {
			$uniqu = 'unique:pages';
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
		$pages = new Pages();
		$input['sort'] = $this->setSort();
		$pages->fill($input);
		if($pages->save()) {
			return $pages->id;
		}
	}
	
	/**
	* Edit
	*/
	public function edit($input, $pages)
	{
		$pages->status = isset($input['status']) ? 1 : 0;
		$pages->fill($input);
		if($pages->update()) {
			return true;
		}
	}
	
	
	/**
	* Sorting
	*/
	private function setSort()
	{
		if (!$page = Pages::all()) {
			return 1;
		} else {
			$max = Pages::get()->max('sort');
			return ($max + 1);
		}
	}
	
	
	public function up($id)
	{
		$page = Pages::find($id);
		if ($other = Pages::where('sort', ($page->sort - 1))->first()) {
			$other->sort ++;
			$other->save();
			$page->sort--;
			$page->save();
		}
		return true;
	}
	
	
	public function down($id)
	{
		$page = Pages::find($id);
		if ($other = Pages::where('sort', ($page->sort + 1))->first()) {
			$other->sort --;
			$other->save();
			$page->sort ++;
			$page->save();
		}
		return true;
	}
	/**
	* Sorting
	*/
	
}

?>