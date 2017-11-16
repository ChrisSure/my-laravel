<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Entities\Blog\Category as Model;
use Cache;


class Category extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
    	if (Cache::has('category')) {
    		$category = Cache::get('category');
		} else {
			$category = Model::defaultOrder()->get()->toTree();
			Cache::add('category', $category, 120);
		}

        return view('widgets.category', [
            'config' => $this->config,
            'category' => $category
        ]);
    }
}
