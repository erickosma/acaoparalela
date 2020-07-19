<?php

namespace Tests\Integration\Api;

use App\Repositories\UserRepository;
use App\User;
use Symfony\Component\HttpFoundation\Response;
use Tests\IntegrationTestCase;

class UserTest extends IntegrationTestCase
{


    /**
     * @var UserRepository
     */
    private $userRepository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->userRepository = new  UserRepository();
    }

    public function testUpdateWithValidNameShouldReturnOk(): void
    {
        $user = factory(User::class)->create();
        $newName = 'New Name';

        $this->loginAs($user)
            ->json('PUT',
                route('api.user.update', $user),
                ['name' => $newName])
            ->assertOk();

        $findUser = $this->userRepository->find($user->id);

        $this->assertEquals($newName, $findUser->name);
    }

    public function testUpdateWithInvalidNameShouldReturn422(): void
    {
        $user = factory(User::class)->create();

        $this->loginAs($user)
            ->json('PUT', route('api.user.update', $user), [])
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonValidationErrors('name');

        $findUser = $this->userRepository->find($user->id);
        $this->assertEquals($user->name, $findUser->name);
    }

    public function testUpdateWithInvalidNameShouldReturnInvalideName(): void
    {
        $user = factory(User::class)->create();
        $newName = $this->faker()->text(500);

        $this->loginAs($user)
            ->json('PUT', route('api.user.update', $user), ['name' => $newName])
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonValidationErrors('name');

        $findUser = $this->userRepository->find($user->id);
        $this->assertEquals($user->name, $findUser->name);
    }
}
