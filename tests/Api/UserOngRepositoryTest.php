<?php


use App\Models\UserOng;
use App\Repositories\UserOngRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Test\MakeUserOngTrait;
use Test\ApiTestTrait;

class UserOngRepositoryTest extends TestCase
{
    use MakeUserOngTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var UserOngRepository
     */
    protected $userOngRepo;

    public function setUp()
    {
        parent::setUp();
        $this->userOngRepo = app()->make(UserOngRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateUserOng()
    {
        $userOng = $this->fakeUserOngData();
        $createdUserOng = $this->userOngRepo->create($userOng);
        $createdUserOng = $createdUserOng->toArray();
        $this->assertArrayHasKey('id', $createdUserOng);
        $this->assertNotNull($createdUserOng['id'], 'Created UserOng must have id specified');
        $this->assertNotNull(UserOng::find($createdUserOng['id']), 'UserOng with given id must be in DB');
        $this->assertModelData($userOng, $createdUserOng);
    }

    /**
     * @test read
     */
    public function testReadUserOng()
    {
        $userOng = $this->makeUserOng();
        $dbUserOng = $this->userOngRepo->find($userOng->id);
        $dbUserOng = $dbUserOng->toArray();
        $this->assertModelData($userOng->toArray(), $dbUserOng);
    }

    /**
     * @test update
     */
    public function testUpdateUserOng()
    {
        $userOng = $this->makeUserOng();
        $fakeUserOng = $this->fakeUserOngData();
        $updatedUserOng = $this->userOngRepo->update($fakeUserOng, $userOng->id);
        $this->assertModelData($fakeUserOng, $updatedUserOng->toArray());
        $dbUserOng = $this->userOngRepo->find($userOng->id);
        $this->assertModelData($fakeUserOng, $dbUserOng->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteUserOng()
    {
        $userOng = $this->makeUserOng();
        $resp = $this->userOngRepo->delete($userOng->id);
        $this->assertTrue($resp);
        $this->assertNull(UserOng::find($userOng->id), 'UserOng should not exist in DB');
    }
}
