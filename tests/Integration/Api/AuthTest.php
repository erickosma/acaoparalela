<?php

namespace Tests\Unit;

use App\User;
use Symfony\Component\HttpFoundation\Response;
use Tests\IntegrationTestCase;

class AuthTest extends IntegrationTestCase
{
    /**
     * Register user
     *
     * @return void
     */
    public function testRegisterWithValidUserShouldReturnCreated()
    {
        $faker = $this->faker();
        $data = [
            'name' => $faker->name,
            'email' => $faker->email,
            'password' => $faker->password(6, 10)
        ];

        $response = $this->json('POST', route('register'), $data);

        $response
            ->assertStatus(Response::HTTP_CREATED)
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
    public function testRegisterWithInvalideEmailShouldReturnDuplicateEntity()
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

        $response
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonValidationErrors('email');

        $this->assertDatabaseHas('users', [
            'email' => $data['email'],
        ]);
    }

    /**
     * Password
     */
    public function testRegisterWithInvalidePasswordShouldReturnDuplicateEntity()
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

    /**
     * Test login
     */
    public function testLoginWithValidParansShouldReturnToken()
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
            "password" => $data['password'],
        ]);

        $response->assertStatus(Response::HTTP_OK)
            ->assertJson(['token_type' => 'bearer'])
            ->assertJson(['expires_in' => '3600']);

        $res_array = (array)json_decode($response->content());
        $this->assertArrayHasKey('access_token', $res_array);
    }
}
