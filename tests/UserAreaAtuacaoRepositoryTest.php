<?php

use App\Models\UserAreaAtuacao;
use App\Repositories\UserAreaAtuacaoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserAreaAtuacaoRepositoryTest extends TestCase
{
    use MakeUserAreaAtuacaoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var UserAreaAtuacaoRepository
     */
    protected $userAreaAtuacaoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->userAreaAtuacaoRepo = App::make(UserAreaAtuacaoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateUserAreaAtuacao()
    {
        $userAreaAtuacao = $this->fakeUserAreaAtuacaoData();
        $createdUserAreaAtuacao = $this->userAreaAtuacaoRepo->create($userAreaAtuacao);
        $createdUserAreaAtuacao = $createdUserAreaAtuacao->toArray();
        $this->assertArrayHasKey('id', $createdUserAreaAtuacao);
        $this->assertNotNull($createdUserAreaAtuacao['id'], 'Created UserAreaAtuacao must have id specified');
        $this->assertNotNull(UserAreaAtuacao::find($createdUserAreaAtuacao['id']), 'UserAreaAtuacao with given id must be in DB');
        $this->assertModelData($userAreaAtuacao, $createdUserAreaAtuacao);
    }

    /**
     * @test read
     */
    public function testReadUserAreaAtuacao()
    {
        $userAreaAtuacao = $this->makeUserAreaAtuacao();
        $dbUserAreaAtuacao = $this->userAreaAtuacaoRepo->find($userAreaAtuacao->id);
        $dbUserAreaAtuacao = $dbUserAreaAtuacao->toArray();
        $this->assertModelData($userAreaAtuacao->toArray(), $dbUserAreaAtuacao);
    }

    /**
     * @test update
     */
    public function testUpdateUserAreaAtuacao()
    {
        $userAreaAtuacao = $this->makeUserAreaAtuacao();
        $fakeUserAreaAtuacao = $this->fakeUserAreaAtuacaoData();
        $updatedUserAreaAtuacao = $this->userAreaAtuacaoRepo->update($fakeUserAreaAtuacao, $userAreaAtuacao->id);
        $this->assertModelData($fakeUserAreaAtuacao, $updatedUserAreaAtuacao->toArray());
        $dbUserAreaAtuacao = $this->userAreaAtuacaoRepo->find($userAreaAtuacao->id);
        $this->assertModelData($fakeUserAreaAtuacao, $dbUserAreaAtuacao->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteUserAreaAtuacao()
    {
        $userAreaAtuacao = $this->makeUserAreaAtuacao();
        $resp = $this->userAreaAtuacaoRepo->delete($userAreaAtuacao->id);
        $this->assertTrue($resp);
        $this->assertNull(UserAreaAtuacao::find($userAreaAtuacao->id), 'UserAreaAtuacao should not exist in DB');
    }
}
