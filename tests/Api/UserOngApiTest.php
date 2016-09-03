<?php



use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use  Test\MakeUserOngTrait;
use Test\ApiTestTrait;


class UserOngApiTest extends TestCase
{
    use MakeUserOngTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateUserOng()
    {
        $userOng = $this->fakeUserOngData();
        $this->json('POST', '/api/v1/userongs', $userOng);

        $this->assertApiResponse($userOng);
    }

    /**
     * @test
     */
    public function testReadUserOng()
    {
        $userOng = $this->makeUserOng();
        $this->json('GET', '/api/v1/userongs/'.$userOng->id);

        $this->assertApiResponse($userOng->toArray());
    }

    /**
     * @test
     */
    public function testUpdateUserOng()
    {
        $userOng = $this->makeUserOng();
        $editedUserOng = $this->fakeUserOngData();

        $this->json('PUT', '/api/v1/userongs/'.$userOng->id, $editedUserOng);

        $this->assertApiResponse($editedUserOng);
    }

    /**
     * @test
     */
    public function testDeleteUserOng()
    {
        $userOng = $this->makeUserOng();
        $this->json('DELETE', '/api/v1/userongs/'.$userOng->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/userongs/'.$userOng->id);

        $this->assertResponseStatus(404);
    }
}
