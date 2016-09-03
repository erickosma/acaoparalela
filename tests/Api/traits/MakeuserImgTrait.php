<?php

namespace Test;

use Faker\Factory as Faker;
use App\Models\userImg;
use App\Repositories\userImgRepository;

trait MakeuserImgTrait
{
    /**
     * Create fake instance of userImg and save it in database
     *
     * @param array $userImgFields
     * @return userImg
     */
    public function makeuserImg($userImgFields = [])
    {
        /** @var userImgRepository $userImgRepo */
        $userImgRepo = app()->make(userImgRepository::class);
        $theme = $this->fakeuserImgData($userImgFields);
        return $userImgRepo->create($theme);
    }

    /**
     * Get fake instance of userImg
     *
     * @param array $userImgFields
     * @return userImg
     */
    public function fakeuserImg($userImgFields = [])
    {
        return new userImg($this->fakeuserImgData($userImgFields));
    }

    /**
     * Get fake data of userImg
     *
     * @param array $postFields
     * @return array
     */
    public function fakeuserImgData($userImgFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'user_id' => $fake->randomDigitNotNull,
            'foto' => $fake->word.$fake->fileExtension
        ], $userImgFields);
    }
}
