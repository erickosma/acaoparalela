<?php

namespace Tests\Integration\Http\Controllers\Api;


use App\City;
use App\Enums\AddresseType;
use App\Repositories\AddressRepository;
use App\Voluntary;
use Illuminate\Support\Facades\Http;
use Tests\IntegrationTestCase;
use Symfony\Component\HttpFoundation\Response;

class AddressControllerTest extends IntegrationTestCase
{

    /**
     * @var  AddressRepository
     */
    private $addressRepository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->addressRepository = new  AddressRepository();
    }

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

    public function testStoreWithValidAddressShouldReturnOk(): void
    {
        $voluntary = factory(Voluntary::class)->create();
        $data = ['cp-cep' => 72621412,
            'state' => 'MG',
            'city' => 'Belo Horizonte',
            'address' => 'Rua Vereador Júlio Ferreira Bairro: A',
            'type' => AddresseType::VOLUNTARY];

        $this->loginAs($voluntary->user)
            ->json('POST', route('api.address.store'), $data)
            ->assertStatus(Response::HTTP_OK)
            ->assertJson(["success" => 'true']);

        $findAddress = $this->addressRepository->findOneBy(['addressesble_id' => $voluntary->user->id ])
            ->get()
            ->first();
        $city =  City::find(2308);

        $this->assertEquals($data['address'], $findAddress->address);
        $this->assertEquals($city->id, $findAddress->city_id);
        $this->assertEquals($city->lat, $findAddress->latitude);
        $this->assertEquals($city->long, $findAddress->longitude);
    }

    public function testStoreWithInvalidCityShouldReturnOk(): void
    {
        $faker = $this->faker();
        $voluntary = factory(Voluntary::class)->create();
        $data = ['cp-cep' => 72621412,
            'state' => $faker->state,
            'city' => $faker->city,
            'address' => $faker->address,
            'type' => AddresseType::VOLUNTARY];

        $this->loginAs($voluntary->user)
            ->json('POST', route('api.address.store'), $data)
            ->assertStatus(Response::HTTP_OK);

        $findAddress = $this->addressRepository->findOneBy(['addressesble_id' => $voluntary->user->id ])
            ->get()
            ->first();

        $this->assertEquals($data['address'], $findAddress->address);
    }
}
