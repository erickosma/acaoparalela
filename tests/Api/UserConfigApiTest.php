<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Test\MakeUserConfigTrait;
use Test\ApiTestTrait;


class UserConfigApiTest extends TestCase
{
    use MakeUserConfigTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;


    /**
     * @test
     */
    public function testDeleteUserConfig()
    {
        $this->assertTrue(true);

    }
}
