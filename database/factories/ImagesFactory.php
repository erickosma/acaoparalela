<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Images;
use Faker\Generator as Faker;

$factory->define(Images::class, function (Faker $faker) {
    return [
        'imageable_id' => function () {
            $generatedUser =  rand(1,3);
            switch ($generatedUser) {
                case 1:
                    return factory(App\Voluntary::class)->create()->id;
                case 2:
                    return factory(App\Ong::class)->create()->id;
                case 3:
                    return factory(App\Assistance::class)->create()->id;
                default:
                    return factory(App\User::class)->create()->id;
            }
        },
        'imageable_type' => \App\Enums\ImageType::getRandomValue()
    ];
});
