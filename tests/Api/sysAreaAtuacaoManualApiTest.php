<?php



use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Test\MakesysAreaAtuacaoManualTrait;
use Test\ApiTestTrait;

class sysAreaAtuacaoManualApiTest extends TestCase
{
    use MakesysAreaAtuacaoManualTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatesysAreaAtuacaoManual()
    {
        $sysAreaAtuacaoManual = $this->fakesysAreaAtuacaoManualData();
        $this->json('POST', '/api/v1/sysAreaAtuacaoManuals', $sysAreaAtuacaoManual);

        $this->assertApiResponse($sysAreaAtuacaoManual);
    }

    /**
     * @test
     */
    public function testReadsysAreaAtuacaoManual()
    {
        $sysAreaAtuacaoManual = $this->makesysAreaAtuacaoManual();
        $this->json('GET', '/api/v1/sysAreaAtuacaoManuals/'.$sysAreaAtuacaoManual->id);

        $this->assertApiResponse($sysAreaAtuacaoManual->toArray());
    }

    /**
     * @test
     */
    public function testUpdatesysAreaAtuacaoManual()
    {
        $sysAreaAtuacaoManual = $this->makesysAreaAtuacaoManual();
        $editedsysAreaAtuacaoManual = $this->fakesysAreaAtuacaoManualData();

        $this->json('PUT', '/api/v1/sysAreaAtuacaoManuals/'.$sysAreaAtuacaoManual->id, $editedsysAreaAtuacaoManual);

        $this->assertApiResponse($editedsysAreaAtuacaoManual);
    }

    /**
     * @test
     */
    public function testDeletesysAreaAtuacaoManual()
    {
        $sysAreaAtuacaoManual = $this->makesysAreaAtuacaoManual();
        $this->json('DELETE', '/api/v1/sysAreaAtuacaoManuals/'.$sysAreaAtuacaoManual->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/sysAreaAtuacaoManuals/'.$sysAreaAtuacaoManual->id);

        $this->assertResponseStatus(404);
    }
}
