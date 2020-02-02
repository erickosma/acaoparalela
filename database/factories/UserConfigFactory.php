<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\UserConfig;
use Faker\Generator as Faker;

$factory->define(UserConfig::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'confidential_address' => rand(0,1),
        'confidential_email' => rand(0,1),
        'confidential_phone' => rand(0,1),
        'confidential_notification' => rand(0,1)
    ];
});
