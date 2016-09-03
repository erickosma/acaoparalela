<?php



use App\Models\sysAreaAtuacaoManual;
use App\Repositories\SysAreaAtuacaoManualRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Test\MakesysAreaAtuacaoManualTrait;
use Test\ApiTestTrait;

class SysAreaAtuacaoManualRepositoryTest extends TestCase
{
    use MakesysAreaAtuacaoManualTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var SysAreaAtuacaoManualRepository
     */
    protected $sysAreaAtuacaoManualRepo;

    public function setUp()
    {
        parent::setUp();
        $this->sysAreaAtuacaoManualRepo = app()->make(SysAreaAtuacaoManualRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatesysAreaAtuacaoManual()
    {
        $sysAreaAtuacaoManual = $this->fakesysAreaAtuacaoManualData();
        $createdsysAreaAtuacaoManual = $this->sysAreaAtuacaoManualRepo->create($sysAreaAtuacaoManual);
        $createdsysAreaAtuacaoManual = $createdsysAreaAtuacaoManual->toArray();
        $this->assertArrayHasKey('id', $createdsysAreaAtuacaoManual);
        $this->assertNotNull($createdsysAreaAtuacaoManual['id'], 'Created sysAreaAtuacaoManual must have id specified');
        $this->assertNotNull(sysAreaAtuacaoManual::find($createdsysAreaAtuacaoManual['id']), 'sysAreaAtuacaoManual with given id must be in DB');
        $this->assertModelData($sysAreaAtuacaoManual, $createdsysAreaAtuacaoManual);
    }

    /**
     * @test read
     */
    public function testReadsysAreaAtuacaoManual()
    {
        $sysAreaAtuacaoManual = $this->makesysAreaAtuacaoManual();
        $dbsysAreaAtuacaoManual = $this->sysAreaAtuacaoManualRepo->find($sysAreaAtuacaoManual->id);
        $dbsysAreaAtuacaoManual = $dbsysAreaAtuacaoManual->toArray();
        $this->assertModelData($sysAreaAtuacaoManual->toArray(), $dbsysAreaAtuacaoManual);
    }

    /**
     * @test update
     */
    public function testUpdatesysAreaAtuacaoManual()
    {
        $sysAreaAtuacaoManual = $this->makesysAreaAtuacaoManual();
        $fakesysAreaAtuacaoManual = $this->fakesysAreaAtuacaoManualData();
        $updatedsysAreaAtuacaoManual = $this->sysAreaAtuacaoManualRepo->update($fakesysAreaAtuacaoManual, $sysAreaAtuacaoManual->id);
        $this->assertModelData($fakesysAreaAtuacaoManual, $updatedsysAreaAtuacaoManual->toArray());
        $dbsysAreaAtuacaoManual = $this->sysAreaAtuacaoManualRepo->find($sysAreaAtuacaoManual->id);
        $this->assertModelData($fakesysAreaAtuacaoManual, $dbsysAreaAtuacaoManual->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletesysAreaAtuacaoManual()
    {
        $sysAreaAtuacaoManual = $this->makesysAreaAtuacaoManual();
        $resp = $this->sysAreaAtuacaoManualRepo->delete($sysAreaAtuacaoManual->id);
        $this->assertTrue($resp);
        $this->assertNull(sysAreaAtuacaoManual::find($sysAreaAtuacaoManual->id), 'sysAreaAtuacaoManual should not exist in DB');
    }
}
