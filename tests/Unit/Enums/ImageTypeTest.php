<?php

namespace Tests\Unit\Enums;

use App\Enums\ImageType;
use App\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class ImageTypeTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTestImage()
    {
        $userType = ImageType::ASSISTANCE;
        $this->assertTrue($userType == "ASSISTANCE" );
    }

    public function testImageTypeTranslatePt()
    {
        $espectLabel = 'ASSISTANCE';
        $imageType = ImageType::ASSISTANCE();
        $this->assertTrue($imageType->value == $espectLabel);
        $this->assertTrue($imageType->key == $espectLabel);
        $this->assertEquals('Assistência', $imageType->description  );
    }

    public function testImageTypeTranslateEn()
    {
        app()->setLocale('en');
        Artisan::call('config:clear');

        //factory(User::class)->create(['email' => 'teste@teste.com']);
        $imageType = ImageType::ASSISTANCE();
        $this->assertTrue($imageType->value == "ASSISTANCE" );
        $this->assertTrue($imageType->key == "ASSISTANCE" );
        $this->assertEquals("Assistance" , $imageType->description);
    }

}
