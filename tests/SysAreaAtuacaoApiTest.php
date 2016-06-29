<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SysAreaAtuacaoApiTest extends TestCase
{
    use MakeSysAreaAtuacaoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateSysAreaAtuacao()
    {
        $sysAreaAtuacao = $this->fakeSysAreaAtuacaoData();
        $this->json('POST', '/api/v1/sysAreaAtuacaos', $sysAreaAtuacao);

        $this->assertApiResponse($sysAreaAtuacao);
    }

    /**
     * @test
     */
    public function testReadSysAreaAtuacao()
    {
        $sysAreaAtuacao = $this->makeSysAreaAtuacao();
        $this->json('GET', '/api/v1/sysAreaAtuacaos/'.$sysAreaAtuacao->id);

        $this->assertApiResponse($sysAreaAtuacao->toArray());
    }

    /**
     * @test
     */
    public function testUpdateSysAreaAtuacao()
    {
        $sysAreaAtuacao = $this->makeSysAreaAtuacao();
        $editedSysAreaAtuacao = $this->fakeSysAreaAtuacaoData();

        $this->json('PUT', '/api/v1/sysAreaAtuacaos/'.$sysAreaAtuacao->id, $editedSysAreaAtuacao);

        $this->assertApiResponse($editedSysAreaAtuacao);
    }

    /**
     * @test
     */
    public function testDeleteSysAreaAtuacao()
    {
        $sysAreaAtuacao = $this->makeSysAreaAtuacao();
        $this->json('DELETE', '/api/v1/sysAreaAtuacaos/'.$sysAreaAtuacao->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/sysAreaAtuacaos/'.$sysAreaAtuacao->id);

        $this->assertResponseStatus(404);
    }
}
