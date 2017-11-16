<?php

namespace Tests\Browser\Admin\System;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use App\Entities\Auth\User;



class SecurityTest extends DuskTestCase
{
    /**
     * @group admin_system
     */
    public function testCrud()
    {
    	$this->browse(function ($first) {
		    $first->loginAs(User::find(1))
		        ->visit('/admin/security/add')
		        ->type('ip', '127.0.0.4')
                ->press('Додати')
                ->assertSee('Ip для блокування добавлено')
                
                ->press('.btn-primary')
                ->assertSee('Редагування - 127.0.0.4')
                ->type('ip', '127.0.0.5')
                ->press('Зберегти')
                ->assertSee('Ip для блокування обновлено')
                
                ->press('.btn-danger')
                ->acceptDialog()
                ->assertSee('IP видалено');
                
		});
	}
     
}
