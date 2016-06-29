<?php

use App\Models\Telefone;
use App\Repositories\TelefoneRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TelefoneRepositoryTest extends TestCase
{
    use MakeTelefoneTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TelefoneRepository
     */
    protected $telefoneRepo;

    public function setUp()
    {
        parent::setUp();
        $this->telefoneRepo = App::make(TelefoneRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTelefone()
    {
        $telefone = $this->fakeTelefoneData();
        $createdTelefone = $this->telefoneRepo->create($telefone);
        $createdTelefone = $createdTelefone->toArray();
        $this->assertArrayHasKey('id', $createdTelefone);
        $this->assertNotNull($createdTelefone['id'], 'Created Telefone must have id specified');
        $this->assertNotNull(Telefone::find($createdTelefone['id']), 'Telefone with given id must be in DB');
        $this->assertModelData($telefone, $createdTelefone);
    }

    /**
     * @test read
     */
    public function testReadTelefone()
    {
        $telefone = $this->makeTelefone();
        $dbTelefone = $this->telefoneRepo->find($telefone->id);
        $dbTelefone = $dbTelefone->toArray();
        $this->assertModelData($telefone->toArray(), $dbTelefone);
    }

    /**
     * @test update
     */
    public function testUpdateTelefone()
    {
        $telefone = $this->makeTelefone();
        $fakeTelefone = $this->fakeTelefoneData();
        $updatedTelefone = $this->telefoneRepo->update($fakeTelefone, $telefone->id);
        $this->assertModelData($fakeTelefone, $updatedTelefone->toArray());
        $dbTelefone = $this->telefoneRepo->find($telefone->id);
        $this->assertModelData($fakeTelefone, $dbTelefone->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTelefone()
    {
        $telefone = $this->makeTelefone();
        $resp = $this->telefoneRepo->delete($telefone->id);
        $this->assertTrue($resp);
        $this->assertNull(Telefone::find($telefone->id), 'Telefone should not exist in DB');
    }
}
