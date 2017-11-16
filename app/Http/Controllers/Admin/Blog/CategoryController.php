<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Logic\Blog\CategoryLogic;
use App\Entities\Blog\Category;
use Cache;
use Log;



class CategoryController extends Controller
{
	
    public function index(Request $request)
    {	
		$category = Category::defaultOrder()->get()->toTree();
    	if ($request->input('name')) {
			$category = Category::where('name', 'like', '%' . $request->input('name') . '%')->get()->toTree();
		}
		return view('admin.blog.category.index' , ['category' => $category]);
	}
	
	
	public function view($id)
	{
		if (!$category = Category::where(['id' => $id])->first()) {
			Log::info('Незнайдено категорію !');
			abort(404, 'Незнайдено категорію !');
		}
		return view('admin.blog.category.view', ['category' => $category]); 
	}
	
	
	
	public function add(Request $request, CategoryLogic $logic)
	{
		if ($request->isMethod('post')) {
			$input = $request->except('_token', '_url');
			$validator = $logic->validate($input);
			if ($validator->fails()) {
				return redirect()->route('categoryAdd')->withErrors($validator)->withInput();
			}
			if ($send = $logic->add($input)) {
				return redirect()->route('categoryView', ['id' => $send])->with('success', 'Категорія добавлена');
			}
		}	
		$category = Category::get()->toTree();
		return view('admin.blog.category.add', ['category' => $category]);
	}
	
	
	public function edit(Request $request, CategoryLogic $logic, Category $category)
	{
		if ($request->isMethod('post')) {
			$input = $request->except('_token', '_url');
			$validator = $logic->validate($input, $category);
			if ($validator->fails()) {
				return redirect()->route('categoryEdit', ['id' => $category])->withErrors($validator)->withInput();
			}
			if ($logic->edit($input, $category)){
				return redirect()->route('categoryView', ['id' => $category->id])->with('success', 'Категорія обновлена');
			}
		}
		$cat = Category::get()->toTree();
		return view('admin.blog.category.update', ['category' => $category->toArray(), 'cat' => $cat]);
	}
	
	
	public function delete($id)
	{
		$category = Category::find($id);
		if ($category->delete()) {
			return redirect()->route('categoryIndex')->with('success', 'Категорія видалена');
		}
	}
	
	
	public function up($id, CategoryLogic $logic)
	{
		$logic->up($id);
		return redirect()->route('categoryIndex');
	}
	
	public function down($id, CategoryLogic $logic)
	{
		$logic->down($id);
		return redirect()->route('categoryIndex');
	}
	
	
}