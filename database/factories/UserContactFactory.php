<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\UserContact;
use Faker\Generator as Faker;

$factory->define(UserContact::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'description' => (rand(0,50) % 2 == 0)  ?  $faker->phoneNumber : $faker->email,
        'type' => \App\Enums\ContactType::getRandomValue()
    ];


});
