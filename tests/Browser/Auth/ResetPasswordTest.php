<?php

namespace Tests\Browser\Auth;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;


class ResetPasswordTest extends DuskTestCase
{
    /**
     * @group auth
     */
    public function testResetPassword()
    {
        $this->browse(function ($browser) {
            $browser->visit('/password/reset')
                    ->type('email', 't@t.ua')
                    ->press('Send Password Reset Link')
                    ->assertPathIs('/password/reset')
                    ->assertSee('We have e-mailed your password reset link!');
        });
    } 
    
}
