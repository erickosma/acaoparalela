<?php

namespace Tests\Unit;

use App\Enums\ImageType;
use PHPUnit\Framework\TestCase;

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
}
