<?php

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
        $userConfigRepo = App::make(UserConfigRepository::class);
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
            'endereco_confidencial' => $fake->word,
            'email_confidencial' => $fake->word,
            'telefone_confidencial' => $fake->word,
            'notificacao_confidencial' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $userConfigFields);
    }
}
