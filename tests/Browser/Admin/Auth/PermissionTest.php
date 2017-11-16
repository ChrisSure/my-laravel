<?php

namespace Tests\Browser\Admin\Auth;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use App\Entities\Auth\User;



class PermissionTest extends DuskTestCase
{
    /**
     * @group admin_auth
     */
    public function testCrud()
    {
    	$this->browse(function ($first) {
		    $first->loginAs(User::find(1))
		        ->visit('/admin/perm/add')
		        ->type('name', 'Perm 99')
                ->type('description', 'description')
                ->press('Додати')
                ->assertSee('Дозвіл добавлено')
                
                ->press('.btn-primary')
                ->assertSee('Редагування - Дозвіл -> Perm 99')
                ->type('name', 'Perm 999')
                ->press('Зберегти')
                ->assertSee('Дозвіл обновлено')
                
                ->press('.btn-danger')
                ->acceptDialog()
                ->assertSee('Дозвіл видалено');
                
		});
	}
     
}
