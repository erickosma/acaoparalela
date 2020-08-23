<?php

namespace Tests\Unit\Services;

use App\Services\AddressService;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response as Status;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Tests\TestCase;

class AddressServiceTest extends TestCase
{
    public function testFindByCepWithValidCepShouldReturnAddress()
    {
        $address = new AddressService();
        Http::fake([
            'api.postmon.com.br/*' => Http::response($this->mockAddress(), 200, ['Headers']),
        ]);
        $response = $address->findByCep(72621412);
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

    public function testFindByCepWithInvalidCepShouldReturnNotFound()
    {
        $this->expectException(NotFoundHttpException::class);

        $address = new AddressService();
        Http::fake([
            'api.postmon.com.br/*' => Http::response([], 404, ['Headers']),
        ]);

        $address->findByCep(72621412);
    }
}
