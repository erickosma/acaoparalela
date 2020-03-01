<?php

namespace Tests\Unit\Enums;

use App\Enums\ImageType;
use App\User;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $userType = ImageType::ASSISTANCE;
        $this->assertTrue($userType == "ASSISTANCE" );
    }

    public function testImageTypeTranslatePt()
    {
        $imageType = ImageType::ASSISTANCE();
        $this->assertTrue($imageType->value == "ASSISTANCE" );
        $this->assertTrue($imageType->key == "ASSISTANCE" );
        $this->assertEquals($imageType->description , "Assistência" );
    }

    public function testImageTypeTranslateEn()
    {
        //factory(User::class)->create(['email' => 'teste@teste.com']);
        $imageType = ImageType::ASSISTANCE();
        $this->assertTrue($imageType->value == "ASSISTANCE" );
        $this->assertTrue($imageType->key == "ASSISTANCE" );
        $this->assertEquals($imageType->description , "Assistência" );
    }

}
