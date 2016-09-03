<?php



use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Test\MakeTelefoneTrait;
use Test\ApiTestTrait;


class TelefoneApiTest extends TestCase
{
    use MakeTelefoneTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTelefone()
    {
        $telefone = $this->fakeTelefoneData();
        $this->json('POST', '/api/v1/telefones', $telefone);

        $this->assertApiResponse($telefone);
    }

    /**
     * @test
     */
    public function testReadTelefone()
    {
        $telefone = $this->makeTelefone();
        $this->json('GET', '/api/v1/telefones/'.$telefone->id);

        $this->assertApiResponse($telefone->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTelefone()
    {
        $telefone = $this->makeTelefone();
        $editedTelefone = $this->fakeTelefoneData();

        $this->json('PUT', '/api/v1/telefones/'.$telefone->id, $editedTelefone);

        $this->assertApiResponse($editedTelefone);
    }

    /**
     * @test
     */
    public function testDeleteTelefone()
    {
        $telefone = $this->makeTelefone();
        $this->json('DELETE', '/api/v1/telefones/'.$telefone->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/telefones/'.$telefone->id);

        $this->assertResponseStatus(404);
    }
}
