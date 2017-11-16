<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Logic\Blog\PagesLogic;
use App\Entities\Blog\Pages;
use DB;
use Log;



class PagesController extends Controller
{
	
    public function index(Request $request, $status = false)
    {	 
    	$query = DB::table('pages');
    	if ($status) {
    		$pages = ($status == 1) ? $query->where('status', 1) : $query->where('status', 0);
		}
		if ($request->input('name')) {
			$query->where('name', 'like', '%' . $request->input('name') . '%');
		}
		$pages = $query->orderBy('sort', 'asc')->paginate(20);
		$name = ($request->input('name')) ? '?name=' . $request->input('name') : '';
		return view('admin.blog.pages.index', ['pages' => $pages, 'status' => $status, 'name' => $name]);
	}
	
	
	public function view($id)
	{
		if (!$page = Pages::where(['id'=>$id])->first()) {
			Log::info('Незнайдено сторінку !');
			abort(404, 'Незнайдено сторінку !');
		}
		return view('admin.blog.pages.view', ['page' => $page]); 
	}
	
	
	public function add(Request $request, PagesLogic $logic)
	{
		if ($request->isMethod('post')) {
			$input = $request->except('_token', '_url');
			$validator = $logic->validate($input);
			if ($validator->fails()) {
				return redirect()->route('pagesAdd')->withErrors($validator)->withInput();
			}
			if ($send = $logic->add($input)) {
				return redirect()->route('pagesView', ['id' => $send])->with('success', 'Сторінка добавлена');
			}
		}	
		return view('admin.blog.pages.add');
	}
	
	
	public function edit(Request $request, PagesLogic $logic, Pages $pages)
	{
		if ($request->isMethod('post')) {
			$input = $request->except('_token', '_url');
			$validator = $logic->validate($input, $pages);
			if ($validator->fails()) {
				return redirect()->route('pagesEdit', ['id' => $pages])->withErrors($validator)->withInput();
			}
			if ($logic->edit($input, $pages)){
				return redirect()->route('pagesView', ['id' => $pages->id])->with('success', 'Сторінка обновлена');
			}
		}
		return view('admin.blog.pages.update', ['pages' => $pages->toArray()]);
	}
	
	
	public function delete($id)
	{
		$page = Pages::find($id);
		if ($page->delete()) {
			return redirect()->route('pagesIndex')->with('success', 'Сторінка видалена');
		}
	}
	
	public function up($id, PagesLogic $logic)
	{
		if ($logic->up($id)) {
			return redirect()->route('pagesIndex');
		}
	}
	
	public function down($id, PagesLogic $logic)
	{
		if ($logic->down($id)) {
			return redirect()->route('pagesIndex');
		}
	}
	
}
