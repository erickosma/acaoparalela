<?php

namespace Tests;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Mockery;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->createApplication();
    }

    public function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        return $app;
    }

    protected function mockAddress(): array
    {
        return [
            "bairro" => "Nova Gameleira",
            "cidade" => "Belo Horizonte",
            "logradouro" => "Rua Vereador Júlio Ferreira",
            "estado_info" => [
                "area_km2" => "586.521,235",
                "codigo_ibge" => "31",
                "nome" => "Minas Gerais",
            ],
            "cep" => "30510090",
            "cidade_info" => [
                "area_km2" => "331,401",
                "codigo_ibge" => "3106200",
            ],
            "estado" => "MG"
        ];
    }
}
