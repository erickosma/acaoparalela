<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserAreaAtuacaoApiTest extends TestCase
{
    use MakeUserAreaAtuacaoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateUserAreaAtuacao()
    {
        $userAreaAtuacao = $this->fakeUserAreaAtuacaoData();
        $this->json('POST', '/api/v1/userAreaAtuacaos', $userAreaAtuacao);

        $this->assertApiResponse($userAreaAtuacao);
    }

    /**
     * @test
     */
    public function testReadUserAreaAtuacao()
    {
        $userAreaAtuacao = $this->makeUserAreaAtuacao();
        $this->json('GET', '/api/v1/userAreaAtuacaos/'.$userAreaAtuacao->id);

        $this->assertApiResponse($userAreaAtuacao->toArray());
    }

    /**
     * @test
     */
    public function testUpdateUserAreaAtuacao()
    {
        $userAreaAtuacao = $this->makeUserAreaAtuacao();
        $editedUserAreaAtuacao = $this->fakeUserAreaAtuacaoData();

        $this->json('PUT', '/api/v1/userAreaAtuacaos/'.$userAreaAtuacao->id, $editedUserAreaAtuacao);

        $this->assertApiResponse($editedUserAreaAtuacao);
    }

    /**
     * @test
     */
    public function testDeleteUserAreaAtuacao()
    {
        $userAreaAtuacao = $this->makeUserAreaAtuacao();
        $this->json('DELETE', '/api/v1/userAreaAtuacaos/'.$userAreaAtuacao->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/userAreaAtuacaos/'.$userAreaAtuacao->id);

        $this->assertResponseStatus(404);
    }
}
