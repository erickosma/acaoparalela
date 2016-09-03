<?php



use App\Models\SysAreaAtuacao;
use App\Repositories\SysAreaAtuacaoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use  Test\MakeSysAreaAtuacaoTrait;
use Test\ApiTestTrait;


class SysAreaAtuacaoRepositoryTest extends TestCase
{
    use MakeSysAreaAtuacaoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var SysAreaAtuacaoRepository
     */
    protected $sysAreaAtuacaoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->sysAreaAtuacaoRepo = app()->make(SysAreaAtuacaoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateSysAreaAtuacao()
    {
        $sysAreaAtuacao = $this->fakeSysAreaAtuacaoData();
        $createdSysAreaAtuacao = $this->sysAreaAtuacaoRepo->create($sysAreaAtuacao);
        $createdSysAreaAtuacao = $createdSysAreaAtuacao->toArray();
        $this->assertArrayHasKey('id', $createdSysAreaAtuacao);
        $this->assertNotNull($createdSysAreaAtuacao['id'], 'Created SysAreaAtuacao must have id specified');
        $this->assertNotNull(SysAreaAtuacao::find($createdSysAreaAtuacao['id']), 'SysAreaAtuacao with given id must be in DB');
        $this->assertModelData($sysAreaAtuacao, $createdSysAreaAtuacao);
    }

    /**
     * @test read
     */
    public function testReadSysAreaAtuacao()
    {
        $sysAreaAtuacao = $this->makeSysAreaAtuacao();
        $dbSysAreaAtuacao = $this->sysAreaAtuacaoRepo->find($sysAreaAtuacao->id);
        $dbSysAreaAtuacao = $dbSysAreaAtuacao->toArray();
        $this->assertModelData($sysAreaAtuacao->toArray(), $dbSysAreaAtuacao);
    }

    /**
     * @test update
     */
    public function testUpdateSysAreaAtuacao()
    {
        $sysAreaAtuacao = $this->makeSysAreaAtuacao();
        $fakeSysAreaAtuacao = $this->fakeSysAreaAtuacaoData();
        $updatedSysAreaAtuacao = $this->sysAreaAtuacaoRepo->update($fakeSysAreaAtuacao, $sysAreaAtuacao->id);
        $this->assertModelData($fakeSysAreaAtuacao, $updatedSysAreaAtuacao->toArray());
        $dbSysAreaAtuacao = $this->sysAreaAtuacaoRepo->find($sysAreaAtuacao->id);
        $this->assertModelData($fakeSysAreaAtuacao, $dbSysAreaAtuacao->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteSysAreaAtuacao()
    {
        $sysAreaAtuacao = $this->makeSysAreaAtuacao();
        $resp = $this->sysAreaAtuacaoRepo->delete($sysAreaAtuacao->id);
        $this->assertTrue($resp);
        $this->assertNull(SysAreaAtuacao::find($sysAreaAtuacao->id), 'SysAreaAtuacao should not exist in DB');
    }
}
