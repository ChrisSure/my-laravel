<?php

namespace Tests\Browser\Admin\System;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use App\Entities\Auth\User;



class SettingTest extends DuskTestCase
{
    /**
     * @group admin_system
     */
    public function testCrud()
    {
    	$this->browse(function ($first) {
		    $first->loginAs(User::find(1))
		        ->visit('/admin/setting')
		        ->assertSee('Настройки')
		        ->type('title', 'Title 99')
                ->press('Зберегти')
                ->assertSee('Настройки обновлені');
		});
	}
     
}
