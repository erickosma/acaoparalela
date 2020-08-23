<?php

namespace Tests\Integration\Http\Controllers\Api;


use Illuminate\Support\Facades\Http;
use Tests\IntegrationTestCase;

class AddressControllerTest extends IntegrationTestCase
{

    public function testShowWithValidAddressShouldReturnOk(): void
    {
        Http::fake([
            'api.postmon.com.br/*' => Http::response($this->mockAddress(), 200, ['Headers']),
        ]);

        $response = $this->json('POST', route('api.address.show', ['cep' => 72621412]));

        $response->assertOk()
            ->assertJson(["bairro" => "Nova Gameleira"])
            ->assertJson(["cidade" => "Belo Horizonte"])
            ->assertJson(["logradouro" => "Rua Vereador Júlio Ferreira"])
            ->assertJson(["cep" => "30510090"])
            ->assertJson(["estado" => "MG"]);
    }

    public function testShowWithInvalidAddressShouldReturnNotFount(): void
    {
        Http::fake([
            'api.postmon.com.br/*' => Http::response([], 404, ['Headers']),
        ]);

        $response = $this->json('POST', route('api.address.show', ['cep' => 72621412]));

        $response->assertNotFound();
        $this->assertFalse($response->isSuccessful());
    }
}
