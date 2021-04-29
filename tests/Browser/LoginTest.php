<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_user_can_login()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email', 'bimawa.soepraoen@gmail.com')
                    ->type('password', '12345678')
                    ->press('Login')
                    ->assertSee('Dashboard')
                    ->assertPathIs('/home');
        });
    }
}
