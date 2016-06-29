<?php

use App\Models\Endereco;
use App\Repositories\EnderecoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EnderecoRepositoryTest extends TestCase
{
    use MakeEnderecoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var EnderecoRepository
     */
    protected $enderecoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->enderecoRepo = App::make(EnderecoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateEndereco()
    {
        $endereco = $this->fakeEnderecoData();
        $createdEndereco = $this->enderecoRepo->create($endereco);
        $createdEndereco = $createdEndereco->toArray();
        $this->assertArrayHasKey('id', $createdEndereco);
        $this->assertNotNull($createdEndereco['id'], 'Created Endereco must have id specified');
        $this->assertNotNull(Endereco::find($createdEndereco['id']), 'Endereco with given id must be in DB');
        $this->assertModelData($endereco, $createdEndereco);
    }

    /**
     * @test read
     */
    public function testReadEndereco()
    {
        $endereco = $this->makeEndereco();
        $dbEndereco = $this->enderecoRepo->find($endereco->id);
        $dbEndereco = $dbEndereco->toArray();
        $this->assertModelData($endereco->toArray(), $dbEndereco);
    }

    /**
     * @test update
     */
    public function testUpdateEndereco()
    {
        $endereco = $this->makeEndereco();
        $fakeEndereco = $this->fakeEnderecoData();
        $updatedEndereco = $this->enderecoRepo->update($fakeEndereco, $endereco->id);
        $this->assertModelData($fakeEndereco, $updatedEndereco->toArray());
        $dbEndereco = $this->enderecoRepo->find($endereco->id);
        $this->assertModelData($fakeEndereco, $dbEndereco->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteEndereco()
    {
        $endereco = $this->makeEndereco();
        $resp = $this->enderecoRepo->delete($endereco->id);
        $this->assertTrue($resp);
        $this->assertNull(Endereco::find($endereco->id), 'Endereco should not exist in DB');
    }
}
