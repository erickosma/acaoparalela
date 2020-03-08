<?php

namespace Tests\Unit;

use App\Models\VO\AccessToken;
use App\User;
use Symfony\Component\HttpFoundation\Response;
use Tests\IntegrationTestCase;

class AuthTest extends IntegrationTestCase
{

    /**
     * Test login
     */
    public function testLoginWithValidParamsShouldReturnToken(): void
    {
        $faker = $this->faker();
        $data = [
            'name' => $faker->name,
            'email' => $faker->email,
            'password' => 'password'
        ];

        $user = factory(User::class)->create(["email" => $data['email'], "name" => $data['name']]);

        /** @var  $accessToken AccessToken */
        $accessToken =  $this->getToken($data['email'], $data['password']);

        $response = $this->withHeaders([
            'Authorization' => $accessToken->token(),
        ])->json('GET', route('me'));

        dd($response->getContent());
    }

    public function testLoginWithInvalidParamsShouldReturNotUnalthorized(): void
    {
        $faker = $this->faker();
        $data = [
            'name' => $faker->name,
            'email' => $faker->email,
            'password' => 'password'
        ];

        factory(User::class)->create(["email" => $data['email'], "name" => $data['name']]);

        $response = $this->json('POST', route('login'), [
            "email" => $data['email'],
            "password" => 'invalidPass',
        ]);

        $response->assertUnauthorized()
            ->assertJson(['success' => false])
            ->assertJson(['message' => trans('auth.failed')]);
    }

    /**
     *
     */
    public function testMeWithValidTokenShouldReturnOk(): void
    {
        $faker = $this->faker();
        $data = [
            'name' => $faker->name,
            'email' => $faker->email,
            'password' => 'password'
        ];

        factory(User::class)->create(["email" => $data['email'], "name" => $data['name']]);

        $response = $this->json('POST', route('login'), [
            "email" => $data['email'],
            "password" => 'invalidPass',
        ]);

        $response->assertUnauthorized()
            ->assertJson(['success' => false])
            ->assertJson(['message' => trans('auth.failed')]);
    }

    /**
     * Register user
     *
     * @return void
     */
    public function testRegisterWithValidUserShouldReturnCreated(): void
    {
        $faker = $this->faker();
        $data = [
            'name' => $faker->name,
            'email' => $faker->email,
            'password' => $faker->password(6, 10)
        ];

        $response = $this->json('POST', route('register'), $data);

        $response->assertCreated()
            ->assertJson(['success' => true])
            ->assertJson(['data' =>
                ["name" => $data['name']]
            ])
            ->assertJson(['data' =>
                ["email" => $data['email']]
            ]);

        $this->assertDatabaseHas('users', [
            'email' => $data['email'],
        ]);
    }

    /**
     * Test duplicate email
     */
    public function testRegisterWithInvalideEmailShouldReturnDuplicateEntity(): void
    {
        $faker = $this->faker();
        $email = $faker->email;
        $data = [
            'name' => $faker->name,
            'email' => $email,
            'password' => $faker->password(6, 10)
        ];

        factory(User::class)->create(['email' => $email]);
        $response = $this->json('POST', route('register'), $data);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonValidationErrors('email');

        $this->assertDatabaseHas('users', [
            'email' => $data['email'],
        ]);
    }

    /**
     * Password
     */
    public function testRegisterWithInvalidePasswordShouldReturnDuplicateEntity(): void
    {
        $faker = $this->faker();
        $data = [
            'name' => $faker->name,
            'email' => $faker->email,
            'password' => $faker->password(11, 20)
        ];

        $response = $this->json('POST', route('register'), $data);

        $response
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonValidationErrors('password');

        $this->assertDatabaseMissing('users', [
            'email' => $data['email'],
        ]);
    }

}
