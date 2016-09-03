<?php

namespace Test;

use Faker\Factory as Faker;
use App\Models\UserConfig;
use App\Repositories\UserConfigRepository;

trait MakeUserConfigTrait
{
    /**
     * Create fake instance of UserConfig and save it in database
     *
     * @param array $userConfigFields
     * @return UserConfig
     */
    public function makeUserConfig($userConfigFields = [])
    {
        /** @var UserConfigRepository $userConfigRepo */
        $userConfigRepo = app()->make(UserConfigRepository::class);
        $theme = $this->fakeUserConfigData($userConfigFields);
        return $userConfigRepo->create($theme);
    }

    /**
     * Get fake instance of UserConfig
     *
     * @param array $userConfigFields
     * @return UserConfig
     */
    public function fakeUserConfig($userConfigFields = [])
    {
        return new UserConfig($this->fakeUserConfigData($userConfigFields));
    }

    /**
     * Get fake data of UserConfig
     *
     * @param array $postFields
     * @return array
     */
    public function fakeUserConfigData($userConfigFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'user_id' => $fake->randomDigitNotNull,
            'endereco_confidencial' => $fake->randomDigitNotNull,
            'email_confidencial' => $fake->randomDigitNotNull,
            'telefone_confidencial' => $fake->randomDigitNotNull,
            'notificacao_confidencial' => $fake->randomDigitNotNull
        ], $userConfigFields);
    }
}
