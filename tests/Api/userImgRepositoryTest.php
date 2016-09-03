<?php


use App\Models\userImg;
use App\Repositories\userImgRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use  Test\MakeuserImgTrait;
use Test\ApiTestTrait;


class userImgRepositoryTest extends TestCase
{
    use MakeuserImgTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var userImgRepository
     */
    protected $userImgRepo;

    public function setUp()
    {
        parent::setUp();
        $this->userImgRepo = app()->make(userImgRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateuserImg()
    {
        $userImg = $this->fakeuserImgData();
        $createduserImg = $this->userImgRepo->create($userImg);
        $createduserImg = $createduserImg->toArray();
        $this->assertArrayHasKey('id', $createduserImg);
        $this->assertNotNull($createduserImg['id'], 'Created userImg must have id specified');
        $this->assertNotNull(userImg::find($createduserImg['id']), 'userImg with given id must be in DB');
        $this->assertModelData($userImg, $createduserImg);
    }

    /**
     * @test read
     */
    public function testReaduserImg()
    {
        $userImg = $this->makeuserImg();
        $dbuserImg = $this->userImgRepo->find($userImg->id);
        $dbuserImg = $dbuserImg->toArray();
        $this->assertModelData($userImg->toArray(), $dbuserImg);
    }

    /**
     * @test update
     */
    public function testUpdateuserImg()
    {
        $userImg = $this->makeuserImg();
        $fakeuserImg = $this->fakeuserImgData();
        $updateduserImg = $this->userImgRepo->update($fakeuserImg, $userImg->id);
        $this->assertModelData($fakeuserImg, $updateduserImg->toArray());
        $dbuserImg = $this->userImgRepo->find($userImg->id);
        $this->assertModelData($fakeuserImg, $dbuserImg->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteuserImg()
    {
        $userImg = $this->makeuserImg();
        $resp = $this->userImgRepo->delete($userImg->id);
        $this->assertTrue($resp);
        $this->assertNull(userImg::find($userImg->id), 'userImg should not exist in DB');
    }
}
