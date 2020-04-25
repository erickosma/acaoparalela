<?php

namespace Tests\Integration\Models;

use App\Enums\UserType;
use App\Models\Profile;
use App\Ong;
use App\Repositories\UserRepository;
use App\User;
use App\Voluntary;
use Tests\IntegrationTestCase;

class ProfileTest extends IntegrationTestCase
{
    /**
     * @var Profile
     */
    private $profile;

    protected function setUp(): void
    {
        parent::setUp();
        $userRepository = new  UserRepository(new User());
        $this->profile = new Profile($userRepository);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUserTypeShouldReturnNull()
    {
        $user = factory(User::class)->create();
        $userType = $this->profile->userType($user->id);

        $this->assertEquals(0, $userType);
    }

    public function testUserTypeVoluntaryShouldReturnVoluntary()
    {
        $user = factory(User::class)->create();
        factory(Voluntary::class)->create(['user_id' => $user->id]);
        $userType = $this->profile->userType($user->id);

        $this->assertEquals(UserType::VOLUNTARY, $userType);
    }

    public function testUserTypeOngShouldReturnOng()
    {
        $user = factory(User::class)->create();
        factory(Ong::class)->create(['user_id' => $user->id]);
        $userType = $this->profile->userType($user->id);

        $this->assertEquals(UserType::ONG, $userType);
    }
}
