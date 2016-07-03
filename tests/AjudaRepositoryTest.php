<?php

use App\Models\Ajuda;
use App\Repositories\AjudaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AjudaRepositoryTest extends TestCase
{
    use MakeAjudaTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var AjudaRepository
     */
    protected $ajudaRepo;

    public function setUp()
    {
        parent::setUp();
        $this->ajudaRepo = App::make(AjudaRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateAjuda()
    {
        $ajuda = $this->fakeAjudaData();
        $createdAjuda = $this->ajudaRepo->create($ajuda);
        $createdAjuda = $createdAjuda->toArray();
        $this->assertArrayHasKey('id', $createdAjuda);
        $this->assertNotNull($createdAjuda['id'], 'Created Ajuda must have id specified');
        $this->assertNotNull(Ajuda::find($createdAjuda['id']), 'Ajuda with given id must be in DB');
        $this->assertModelData($ajuda, $createdAjuda);
    }

    /**
     * @test read
     */
    public function testReadAjuda()
    {
        $ajuda = $this->makeAjuda();
        $dbAjuda = $this->ajudaRepo->find($ajuda->id);
        $dbAjuda = $dbAjuda->toArray();
        $this->assertModelData($ajuda->toArray(), $dbAjuda);
    }

    /**
     * @test update
     */
    public function testUpdateAjuda()
    {
        $ajuda = $this->makeAjuda();
        $fakeAjuda = $this->fakeAjudaData();
        $updatedAjuda = $this->ajudaRepo->update($fakeAjuda, $ajuda->id);
        $this->assertModelData($fakeAjuda, $updatedAjuda->toArray());
        $dbAjuda = $this->ajudaRepo->find($ajuda->id);
        $this->assertModelData($fakeAjuda, $dbAjuda->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteAjuda()
    {
        $ajuda = $this->makeAjuda();
        $resp = $this->ajudaRepo->delete($ajuda->id);
        $this->assertTrue($resp);
        $this->assertNull(Ajuda::find($ajuda->id), 'Ajuda should not exist in DB');
    }
}
