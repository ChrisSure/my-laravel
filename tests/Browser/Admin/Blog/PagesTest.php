<?php

namespace Tests\Browser\Admin\Blog;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use App\Entities\Auth\User;



class PagesTest extends DuskTestCase
{
    /**
     * @group admin_blog
     */
    public function testCrud()
    {
    	$this->browse(function ($first) {
		    $first->loginAs(User::find(1))
		        ->visit('/admin/pages/add')
		        ->type('name', 'Article 99')
                ->type('slug', 'article_99')
                ->check('status')
                ->press('Додати')
                ->assertSee('Сторінка добавлена')
                
                ->press('.btn-primary')
                ->assertSee('Редагування - Article 99')
                ->type('name', 'Article 999')
                ->press('Зберегти')
                ->assertSee('Сторінка обновлена')
                
                ->press('.btn-danger')
                ->acceptDialog()
                ->assertSee('Сторінка видалена');
		});
	}
     
}
