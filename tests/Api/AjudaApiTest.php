<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Test\MakeAjudaTrait;
use Test\ApiTestTrait;

class AjudaApiTest extends TestCase
{
    use MakeAjudaTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;


    public function setUp()
    {
        parent::setUp();
    }

    /**
     * @test
     */
    public function testCreateAjuda()
    {
        $ajuda = $this->fakeAjudaData();
        $this->json('POST', '/api/v1/ajudas', $ajuda);

        $this->assertApiResponse($ajuda);
    }

    /**
     * @test
     */
    public function testReadAjuda()
    {
        $ajuda = $this->makeAjuda();
        $this->json('GET', '/api/v1/ajudas/'.$ajuda->id);

        $this->assertApiResponse($ajuda->toArray());
    }

    /**
     * @test
     */
    public function testUpdateAjuda()
    {
        $ajuda = $this->makeAjuda();
        $editedAjuda = $this->fakeAjudaData();

        $this->json('PUT', '/api/v1/ajudas/'.$ajuda->id, $editedAjuda);

        $this->assertApiResponse($editedAjuda);
    }

    /**
     * @test
     */
    public function testDeleteAjuda()
    {
        $ajuda = $this->makeAjuda();
        $this->json('DELETE', '/api/v1/ajudas/'.$ajuda->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/ajudas/'.$ajuda->id);

        $this->assertResponseStatus(404);
    }
}
