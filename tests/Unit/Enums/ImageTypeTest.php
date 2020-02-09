<?php

namespace Tests\Unit;

use App\Enums\ImageType;
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
        $imageType = ImageType::ASSISTANCE();
        $this->assertTrue($imageType->value == "ASSISTANCE" );
        $this->assertTrue($imageType->key == "ASSISTANCE" );
        $this->assertEquals($imageType->description , "Assistência" );
    }

}
