<?php

namespace Tests\Browser\Auth;

use App\Entities\Auth\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;


class LoginTest extends DuskTestCase
{
    /**
     * @group auth
     */
    public function testLogin()
    {
		$this->browse(function ($browser) {
            $browser->visit('/login')
                    ->type('email', 't@t.ua')
                    ->type('password', '123')
                    ->press('Login')
                    ->assertPathIs('/admin');
        });
	}
     
}
