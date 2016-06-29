<?php

use Faker\Factory as Faker;
use App\Models\UserOng;
use App\Repositories\UserOngRepository;

trait MakeUserOngTrait
{
    /**
     * Create fake instance of UserOng and save it in database
     *
     * @param array $userOngFields
     * @return UserOng
     */
    public function makeUserOng($userOngFields = [])
    {
        /** @var UserOngRepository $userOngRepo */
        $userOngRepo = App::make(UserOngRepository::class);
        $theme = $this->fakeUserOngData($userOngFields);
        return $userOngRepo->create($theme);
    }

    /**
     * Get fake instance of UserOng
     *
     * @param array $userOngFields
     * @return UserOng
     */
    public function fakeUserOng($userOngFields = [])
    {
        return new UserOng($this->fakeUserOngData($userOngFields));
    }

    /**
     * Get fake data of UserOng
     *
     * @param array $postFields
     * @return array
     */
    public function fakeUserOngData($userOngFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'user_id' => $fake->randomDigitNotNull,
            'endereco_id' => $fake->randomDigitNotNull,
            'nome_fantasia' => $fake->word,
            'razao_social' => $fake->word,
            'desc_ong' => $fake->text,
            'site' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $userOngFields);
    }
}
