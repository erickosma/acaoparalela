<?php

namespace Tests;

use Illuminate\Contracts\Console\Kernel;

trait CreatesApplication
{

    public function createDb()
    {
        $fileName = database_path('database.sqlite');
        if (!file_exists($fileName)) {
            file_put_contents($fileName, "");
        }
    }
}
