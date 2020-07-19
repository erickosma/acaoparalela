<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Voluntary;
use Faker\Generator as Faker;

$factory->define(Voluntary::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'objective' => $faker->paragraph,
        'description' => $faker->words(5, true)
    ];
});
