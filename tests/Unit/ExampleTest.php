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
    public function testBasicTestExemple()
    {
        $userType = ImageType::ASSISTANCE;
        $this->assertTrue($userType == "ASSISTANCE");
    }


    /**
     *
     * {
     * "bairro": "Nova Gameleira",
     * "cidade": "Belo Horizonte",
     * "logradouro": "Rua Vereador Júlio Ferreira",
     * "estado_info": {
     * "area_km2": "586.521,235",
     * "codigo_ibge": "31",
     * "nome": "Minas Gerais"
     * },
     * "cep": "30510090",
     * "cidade_info": {
     * "area_km2": "331,401",
     * "codigo_ibge": "3106200"
     * },
     * "estado": "MG"
     * }
     */
}
