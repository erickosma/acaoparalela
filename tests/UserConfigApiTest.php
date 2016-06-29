<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserConfigApiTest extends TestCase
{
    use MakeUserConfigTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateUserConfig()
    {
        $userConfig = $this->fakeUserConfigData();
        $this->json('POST', '/api/v1/userConfigs', $userConfig);

        $this->assertApiResponse($userConfig);
    }

    /**
     * @test
     */
    public function testReadUserConfig()
    {
        $userConfig = $this->makeUserConfig();
        $this->json('GET', '/api/v1/userConfigs/'.$userConfig->id);

        $this->assertApiResponse($userConfig->toArray());
    }

    /**
     * @test
     */
    public function testUpdateUserConfig()
    {
        $userConfig = $this->makeUserConfig();
        $editedUserConfig = $this->fakeUserConfigData();

        $this->json('PUT', '/api/v1/userConfigs/'.$userConfig->id, $editedUserConfig);

        $this->assertApiResponse($editedUserConfig);
    }

    /**
     * @test
     */
    public function testDeleteUserConfig()
    {
        $userConfig = $this->makeUserConfig();
        $this->json('DELETE', '/api/v1/userConfigs/'.$userConfig->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/userConfigs/'.$userConfig->id);

        $this->assertResponseStatus(404);
    }
}
