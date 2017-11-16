<?php

namespace Tests\Browser\Admin\Blog;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use App\Entities\Auth\User;



class CategoryTest extends DuskTestCase
{
    /**
     * @group admin_blog
     */
    public function testCrud()
    {
    	$this->browse(function ($first) {
		    $first->loginAs(User::find(1))
		        ->visit('/admin/category/add')
		        ->type('name', 'Category 99')
                ->type('slug', 'category_99')
                ->select('parent_id', 'Батьківська')
                ->press('Додати')
                ->assertSee('Категорія добавлена')
                
                ->press('.btn-primary')
                ->assertSee('Редагування - Category 99')
                ->type('name', 'Category 999')
                ->press('Зберегти')
                ->assertSee('Категорія обновлена')
                
                ->press('.btn-danger')
                ->acceptDialog()
                ->assertSee('Категорія видалена');
                
		});
	}
     
}
