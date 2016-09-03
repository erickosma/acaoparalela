<?php

namespace Test;

use Faker\Factory as Faker;
use App\Models\UserAreaAtuacao;
use App\Repositories\UserAreaAtuacaoRepository;

trait MakeUserAreaAtuacaoTrait
{
    /**
     * Create fake instance of UserAreaAtuacao and save it in database
     *
     * @param array $userAreaAtuacaoFields
     * @return UserAreaAtuacao
     */
    public function makeUserAreaAtuacao($userAreaAtuacaoFields = [])
    {
        /** @var UserAreaAtuacaoRepository $userAreaAtuacaoRepo */
        $userAreaAtuacaoRepo = app()->make(UserAreaAtuacaoRepository::class);
        $theme = $this->fakeUserAreaAtuacaoData($userAreaAtuacaoFields);
        return $userAreaAtuacaoRepo->create($theme);
    }

    /**
     * Get fake instance of UserAreaAtuacao
     *
     * @param array $userAreaAtuacaoFields
     * @return UserAreaAtuacao
     */
    public function fakeUserAreaAtuacao($userAreaAtuacaoFields = [])
    {
        return new UserAreaAtuacao($this->fakeUserAreaAtuacaoData($userAreaAtuacaoFields));
    }

    /**
     * Get fake data of UserAreaAtuacao
     *
     * @param array $postFields
     * @return array
     */
    public function fakeUserAreaAtuacaoData($userAreaAtuacaoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'user_id' => $fake->randomDigitNotNull,
            'id_area_atuacao' => $fake->randomDigitNotNull,
            'manual' => $fake->randomDigitNotNull
        ], $userAreaAtuacaoFields);
    }
}
