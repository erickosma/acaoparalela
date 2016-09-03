<?php



use App\Models\UserConfig;
use App\Repositories\UserConfigRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Test\MakeUserConfigTrait;
use Test\ApiTestTrait;


class UserConfigRepositoryTest extends TestCase
{
    use MakeUserConfigTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var UserConfigRepository
     */
    protected $userConfigRepo;

    public function setUp()
    {
        parent::setUp();
        $this->userConfigRepo = app()->make(UserConfigRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateUserConfig()
    {
        $userConfig = $this->fakeUserConfigData();
        $createdUserConfig = $this->userConfigRepo->create($userConfig);
        $createdUserConfig = $createdUserConfig->toArray();
        $this->assertArrayHasKey('id', $createdUserConfig);
        $this->assertNotNull($createdUserConfig['id'], 'Created UserConfig must have id specified');
        $this->assertNotNull(UserConfig::find($createdUserConfig['id']), 'UserConfig with given id must be in DB');
        $this->assertModelData($userConfig, $createdUserConfig);
    }

    /**
     * @test read
     */
    public function testReadUserConfig()
    {
        $userConfig = $this->makeUserConfig();
        $dbUserConfig = $this->userConfigRepo->find($userConfig->id);
        $dbUserConfig = $dbUserConfig->toArray();
        $this->assertModelData($userConfig->toArray(), $dbUserConfig);
    }

    /**
     * @test update
     */
    public function testUpdateUserConfig()
    {
        $userConfig = $this->makeUserConfig();
        $fakeUserConfig = $this->fakeUserConfigData();
        $updatedUserConfig = $this->userConfigRepo->update($fakeUserConfig, $userConfig->id);
        $this->assertModelData($fakeUserConfig, $updatedUserConfig->toArray());
        $dbUserConfig = $this->userConfigRepo->find($userConfig->id);
        $this->assertModelData($fakeUserConfig, $dbUserConfig->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteUserConfig()
    {
        $userConfig = $this->makeUserConfig();
        $resp = $this->userConfigRepo->delete($userConfig->id);
        $this->assertTrue($resp);
        $this->assertNull(UserConfig::find($userConfig->id), 'UserConfig should not exist in DB');
    }
}
