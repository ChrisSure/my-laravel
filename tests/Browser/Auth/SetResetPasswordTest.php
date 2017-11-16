<?php

namespace Tests\Browser\Auth;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;


class SetResetPasswordTest extends DuskTestCase
{
    /**
     * @group auth
     */ 
    public function testSetResetPassword()
    {
    	$this->browse(function ($browser) {
            $browser->visit('/password/reset/nUGcgX2sLf6gmNkt9w1ap8LZVRP7xusVE5eX9kq0wlW4GeytamfcqBs5zPBQ')
                    ->type('email', 't@t.ua')
                    ->type('password', '123456')
                    ->type('password', '123456')
                    ->press('Reset Password')
                    ->assertPathIs('/');
        });
	}
    
}
