<?php

namespace Tests\Integration\Api;

use App\Repositories\UserRepository;
use App\Repositories\VoluntaryRepository;
use App\User;
use App\Voluntary;
use Symfony\Component\HttpFoundation\Response;
use Tests\IntegrationTestCase;

class VoluntaryTest extends IntegrationTestCase
{
    /**
     * @var UserRepository
     */
    private $voluntaryRepository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->voluntaryRepository = new  VoluntaryRepository();
    }

    public function testUpdateWithValidNameShouldReturnOk(): void
    {
        $faker = $this->faker();
        $voluntary = factory(Voluntary::class)->create();
        $data = ['objective' => $faker->text, 'description' => $faker->words(5, true)];

        $this->loginAs($voluntary->user)
            ->json('PUT', route('api.voluntary.update', $voluntary->user), $data)
            ->assertOk();

        $findVoluntary = $this->voluntaryRepository->find($voluntary->id);

        $this->assertEquals($data['description'], $findVoluntary->description);
        $this->assertEquals($data['objective'], $findVoluntary->objective);
    }

    public function testUpdateWithInvalidNameShouldReturn422(): void
    {
        $voluntary = factory(Voluntary::class)->create();

        $this->loginAs($voluntary->user)
            ->json('PUT', route('api.voluntary.update', $voluntary->user), [])
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonValidationErrors('description');

        $findVoluntary = $this->voluntaryRepository->find($voluntary->id);
        $this->assertEquals($voluntary->description, $findVoluntary->description);
        $this->assertEquals($voluntary->objective, $findVoluntary->objective);
    }

    public function testUpdateWithInvalidNameShouldReturnInvalideDescription(): void
    {
        $faker = $this->faker();
        $voluntary = factory(Voluntary::class)->create();
        $newDescription = $this->faker()->text(500);
        $data = ['objective' => $faker->text, 'description' => $newDescription];

        $this->loginAs($voluntary->user)
            ->json('PUT', route('api.voluntary.update', $voluntary->user), $data)
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonValidationErrors('description');

        $findVoluntary = $this->voluntaryRepository->find($voluntary->id);
        $this->assertEquals($voluntary->description, $findVoluntary->description);
        $this->assertEquals($voluntary->objective, $findVoluntary->objective);
    }
}
