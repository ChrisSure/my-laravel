<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Entities\Blog\Pages as Model;



class Pages extends AbstractWidget
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
		$pages = Model::where(['status' => 1])->get();
        return view('widgets.pages', [
            'config' => $this->config,
            'pages' => $pages
        ]);
    }
}
