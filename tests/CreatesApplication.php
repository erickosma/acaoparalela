<?php

namespace Tests;

use Illuminate\Contracts\Console\Kernel;

trait CreatesApplication
{

    public function createDb()
    {
        $fileName = base_path(env("DB_DATABASE"));
        if (!file_exists($fileName)) {
            file_put_contents($fileName, "");
        }
    }
}
