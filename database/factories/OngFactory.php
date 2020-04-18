<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ong;
use Faker\Generator as Faker;

$factory->define(Ong::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'fantasy_name' => $faker->company,
        'company_name' => $faker->companySuffix,
        'description' => $faker->text,
        'site' => $faker->url
    ];
});
