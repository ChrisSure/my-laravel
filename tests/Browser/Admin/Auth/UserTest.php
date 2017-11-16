<?php

namespace Tests\Browser\Admin\Auth;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use App\Entities\Auth\User;



class UserTest extends DuskTestCase
{
    /**
     * @group admin_auth
     */
    public function testCrud()
    {
    	$this->browse(function ($first) {
		    $first->loginAs(User::find(1))
		        //->visit('/admin')
		        ->visit('/admin/user/add')
		        ->type('name', 'User 99')
		        ->type('email', 'u@u.ua')
                ->type('password', '123')
                ->select('role', 'User')
                ->check('status')
                ->press('Додати')
                ->assertSee('Перегляд - User 99')
                
                ->press('.btn-primary')
                ->assertSee('Редагування - User 99')
                ->type('name', 'User 999')
                ->press('Зберегти')
                ->assertSee('Перегляд - User 999')
                
                ->press('#test_user_pass')
                ->assertSee('Зміна пароля для - User 999')
                ->type('password', '123')
                ->press('Зберегти')
                ->assertSee('Пароль змінено')
                
                ->press('#test_user_delete')
                ->acceptDialog()
                ->assertSee('Користувач видалений');
                
		});
	}
     
}
