<?php



use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Test\MakeEnderecoTrait;
use Test\ApiTestTrait;


class EnderecoApiTest extends TestCase
{
    use MakeEnderecoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateEndereco()
    {
        $endereco = $this->fakeEnderecoData();
        $this->json('POST', '/api/v1/enderecos', $endereco);

        $this->assertApiResponse($endereco);
    }

    /**
     * @test
     */
    public function testReadEndereco()
    {
        $endereco = $this->makeEndereco();
        $this->json('GET', '/api/v1/enderecos/'.$endereco->id);

        $this->assertApiResponse($endereco->toArray());
    }

    /**
     * @test
     */
    public function testUpdateEndereco()
    {
        $endereco = $this->makeEndereco();
        $editedEndereco = $this->fakeEnderecoData();

        $this->json('PUT', '/api/v1/enderecos/'.$endereco->id, $editedEndereco);

        $this->assertApiResponse($editedEndereco);
    }

    /**
     * @test
     */
    public function testDeleteEndereco()
    {
        $endereco = $this->makeEndereco();
        $this->json('DELETE', '/api/v1/enderecos/'.$endereco->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/enderecos/'.$endereco->id);

        $this->assertResponseStatus(404);
    }
}
