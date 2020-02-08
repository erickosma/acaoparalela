<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\UserContact;
use Faker\Generator as Faker;

$factory->define(UserContact::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'phone' => $faker->phoneNumber,
        'email' => $faker->email,
        'type' => rand(0,2)
    ];
});
