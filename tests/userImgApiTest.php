<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class userImgApiTest extends TestCase
{
    use MakeuserImgTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateuserImg()
    {
        $userImg = $this->fakeuserImgData();
        $this->json('POST', '/api/v1/userImgs', $userImg);

        $this->assertApiResponse($userImg);
    }

    /**
     * @test
     */
    public function testReaduserImg()
    {
        $userImg = $this->makeuserImg();
        $this->json('GET', '/api/v1/userImgs/'.$userImg->id);

        $this->assertApiResponse($userImg->toArray());
    }

    /**
     * @test
     */
    public function testUpdateuserImg()
    {
        $userImg = $this->makeuserImg();
        $editeduserImg = $this->fakeuserImgData();

        $this->json('PUT', '/api/v1/userImgs/'.$userImg->id, $editeduserImg);

        $this->assertApiResponse($editeduserImg);
    }

    /**
     * @test
     */
    public function testDeleteuserImg()
    {
        $userImg = $this->makeuserImg();
        $this->json('DELETE', '/api/v1/userImgs/'.$userImg->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/userImgs/'.$userImg->id);

        $this->assertResponseStatus(404);
    }
}
