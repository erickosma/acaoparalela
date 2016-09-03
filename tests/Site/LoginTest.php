<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;

/**
 * Created by PhpStorm.
 * User: zoy
 * Date: 30/03/16
 * Time: 23:59
 */
class LoginTest extends TestCase
{

    use WithoutMiddleware;

    /**
     *
     */
    public function setUp()
    {
        parent::setUp();

    }


    /**
     *
     */
    public function testSeeLogin()
    {
        $this->visit('/login')
            ->seePageIs('login');
    }

    /**
     *
     */
    public function testLoginFail()
    {
        $response = $this->call('GET', '/login');

        $this->assertEquals(200, $response->status());
       /* $this->visit('/login')
            ->type('teste@teste.com', 'email')
            ->type('1', 'password')
            ->press('Login')
            ->seePageIs('login');*/
    }
}
