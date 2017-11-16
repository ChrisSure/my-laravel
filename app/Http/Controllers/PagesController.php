<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Blog\Pages;
use Log;
use MetaTag;


class PagesController extends Controller
{
    
    public function index($slug)
    {
    	if (!$page = Pages::where(['slug' => $slug])->first()) {
			Log::info('Незнайдено сторінку');
			abort(404, 'Незнайдено сторінку !');
		}
		$this->setMetaTags($page->title, $page->description, $page->keywords);
		return view('blog.pages.view', compact('page'));
	}
    
}
