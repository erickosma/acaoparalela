<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Slug;
use Faker\Generator as Faker;

$factory->define(Slug::class, function (Faker $faker) {
    return [
        'slugable_id' => function () {
            $generatedUser =  rand(1,2);
            switch ($generatedUser) {
                case 1:
                    return factory(App\Voluntary::class)->create()->id;
                case 2:
                    return factory(App\Ong::class)->create()->id;
                default:
                    return factory(App\User::class)->create()->id;
            }
        },
        'slugable_type' => \App\Enums\UserType::getRandomValue(),
        'title' => $faker->title
    ];
});
