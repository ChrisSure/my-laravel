<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Blog\Category;
use Log;
use MetaTag;


class CategoryController extends Controller
{
    
    public function index($slug)
    {
    	if (!$category = Category::where(['slug' => $slug])->first()) {
			Log::info('Незнайдено категорію');
			abort(404, 'Незнайдено категорію !');
		}
		$this->setMetaTags($category->title, $category->description, $category->keywords);
		return view('blog.category.view', compact('category'));
	}
    
}
