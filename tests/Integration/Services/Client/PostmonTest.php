<?php

namespace Tests\Integration\Services\Client;

use App\Services\Client\Postmon;
use Tests\IntegrationTestCase;
use Symfony\Component\HttpFoundation\Response as Status;

class PostmonTest extends IntegrationTestCase
{
    public function testGetAddressesWithValidCepShouldReturnAddress()
    {
        $fooBar = new  Postmon();
        $response = $fooBar->getAddresses(30510090);
        $arrResponse = $response->json();

        $this->assertEquals(Status::HTTP_OK, $response->status());
        $this->assertArrayHasKey('bairro', $arrResponse);
        $this->assertArrayHasKey('cidade', $arrResponse);
        $this->assertArrayHasKey('logradouro', $arrResponse);
        $this->assertArrayHasKey('estado_info', $arrResponse);
        $this->assertArrayHasKey('cep', $arrResponse);
        $this->assertArrayHasKey('cidade_info', $arrResponse);
        $this->assertArrayHasKey('estado', $arrResponse);

        $this->assertEquals("Nova Gameleira", $arrResponse['bairro']);
        $this->assertEquals("Belo Horizonte", $arrResponse['cidade']);
        $this->assertEquals("30510090", $arrResponse['cep']);
        $this->assertEquals("MG", $arrResponse['estado']);
    }

    public function testGetAddressesWithInvalidCepShouldReturnAddress()
    {
        $fooBar = new  Postmon();
        $response = $fooBar->getAddresses(30510090111);

        $this->assertEquals(Status::HTTP_NOT_FOUND, $response->status());
        $this->assertNull($response->json());
    }
}
