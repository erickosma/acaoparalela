<?php


namespace Tests\Integration\Http\Controllers\Web;


use App\User;
use App\Voluntary;
use Tests\IntegrationTestCase;

class ProfileControllerTest extends IntegrationTestCase
{

    public function testIndexWithInvalidTokenRedirectToLogin(): void
    {
        $faker = $this->faker();
        $response = $this->withHeaders([
            'Authorization' => $faker->password,
        ])->get(route('web.profile'));

        $response->assertRedirect('/login');
    }

    public function testIndexWithValidToken(): void
    {
        $user = factory(User::class)->create();

        $this->loginAs($user)
            ->get(route('web.profile'))
            ->assertOk()
            ->assertSeeText('Ação Paralela  - Perfil')
            ->assertSeeText('Voluntário')
            ->assertSeeText('Ong');
    }

    public function testProfileWithVoluntaryShouldRedirect(): void
    {
        $user = factory(User::class)->create();
        factory(Voluntary::class)->create(['user_id' => $user->id]);

         $this->loginAs($user)
            ->get(route('web.profile'))
            ->assertRedirect(route('web.profile.vol'));
    }

    public function testProfileVoluntaryWithValidToken(): void
    {
        $user = factory(User::class)->create();
        factory(Voluntary::class)->create(['user_id' => $user->id]);


        $this->loginAs($user)
            ->get(route('web.profile.vol'))
            ->assertSee($user->name);
    }
}
