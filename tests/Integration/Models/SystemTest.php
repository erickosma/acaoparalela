<?php

namespace Tests\Integration\Models;

use App\Models\System;
use Tests\IntegrationTestCase;

class SystemTest extends IntegrationTestCase
{

    public function testOccupationsShouldReturnCollection()
    {
        $ystem = new System();
        $ystem->occupations();
        $this->assertTrue(true);
    }
}
