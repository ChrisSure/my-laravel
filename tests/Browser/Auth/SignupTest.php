<?php

namespace Tests\Browser\Auth;

use App\Entities\Auth\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;


class SignupTest extends DuskTestCase
{
    /**
     * @group signup
     */
    public function testLogin()
    {
    	
		$this->browse(function ($browser) {
            $browser->visit('/register')
                    ->type('name', 'Frank')
                    ->type('email', 'f@f.ua')
                    ->type('password', '123')
                    ->type('password_confirmation', '123')
                    ->press('Register')
                    ->assertPathIs('/')
                    ->assertSee('На ваш email вислані подальші інструкції !');
        });
	}
     
}