<?php

namespace Tests\Browser\Admin\Auth;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use App\Entities\Auth\User;



class RoleTest extends DuskTestCase
{
    /**
     * @group admin_auth
     */
    public function testCrud()
    {
    	$this->browse(function ($first) {
		    $first->loginAs(User::find(1))
		        ->visit('/admin/roles/add')
		        ->type('name', 'Role 99')
                ->type('description', 'description')
                ->check('perm[]')
                ->press('Додати')
                ->assertSee('Роль добавлено')
                
                ->press('.btn-primary')
                ->assertSee('Редагування - Роль -> Role 99')
                ->type('name', 'Role 999')
                ->press('Зберегти')
                ->assertSee('Роль обновлено')
                
                ->press('.btn-danger')
                ->acceptDialog()
                ->assertSee('Роль видалено');
                
		});
	}
     
}
