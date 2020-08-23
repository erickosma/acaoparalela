<?php

namespace Tests\Integration\Http\Controllers\Api;

use App\Models\VO\AccessToken;
use App\User;
use Symfony\Component\HttpFoundation\Response;
use Tests\IntegrationTestCase;

class AuthControllerTest extends IntegrationTestCase
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

        $response->assertOk()
            ->assertJson(['id' => $user->id])
            ->assertJson(['name' => $user->name])
            ->assertJson(['email' => $user->email]);
    }

    public function testLoginWithInvalidParamsShouldReturnNotUnalthorized(): void
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

        $response->assertStatus(400)
            ->assertJson(['success' => false])
            ->assertJson(['message' => trans('auth.failed')]);
    }

    /**
     * Logout
     */
    public function testLogoutWithValidParamsShouldReturnOk(): void
    {
        $accessToken = $this->getUserToken();

        $response = $this->withHeaders([
            'Authorization' => $accessToken->token(),
        ])->json('GET', route('logout'));

        $response->assertOk()
            ->assertJson(['message' => 'Sucesso.']);
    }

    public function testLogoutWithInvalidParamsShouldReturnUnauthenticated(): void
    {
        $faker = $this->faker();
        $response = $this->withHeaders([
            'Authorization' => $faker->password,
        ])->json('GET', route('logout'));

        $response->assertUnauthorized()
            ->assertJson(['message' => 'Unauthenticated.']);
    }

    public function testRefreshWithValidParamsShouldReturnOk(): void
    {
        $accessToken = $this->getUserToken();

        $response = $this->withHeaders([
            'Authorization' => $accessToken->token(),
        ])->json('POST', route('refresh'));

        $response->assertOk()
            ->assertJson(['token_type' => 'bearer'])
            ->assertJson(['expires_in' => '3600']);

        $newAccessToken = $this->transformAccessToken($response);

        $this->assertNotEquals($accessToken->accessToken(), $newAccessToken->accessToken());
        $this->assertEquals($accessToken->type(), $newAccessToken->type());
        $this->assertEquals($accessToken->expires(), $newAccessToken->expires());
    }

    /**
     * Me
     */
    public function testMeWithValidTokenShouldReturnBadRequest(): void
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

        $response->assertStatus(400)
            ->assertJson(['success' => false])
            ->assertJson(['message' => trans('auth.failed')]);
    }

    public function testMeWithValidParamsShouldReturnOk(): void
    {
        $faker = $this->faker();
        $data = [
            'name' => $faker->name,
            'email' => $faker->email,
            'password' => 'password'
        ];

        factory(User::class)->create(["email" => $data['email'], "name" => $data['name']]);

        /** @var  $accessToken AccessToken */
        $accessToken = $this->getToken($data['email'], $data['password']);

        $response = $this->withHeaders([
            'Authorization' => $accessToken->token(),
        ])->json('GET', route('me'));

        $response->assertOk()
            ->assertJson(
                ["name" => $data['name']
            ])
            ->assertJson(
                ["email" => $data['email']
            ]);

        $this->assertDatabaseHas('users', [
            'email' => $data['email'],
        ]);
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
    public function testRegisterWithInvalidEmailShouldReturnDuplicateEntity(): void
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
    public function testRegisterWithInvalidPasswordShouldReturnDuplicateEntity(): void
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
