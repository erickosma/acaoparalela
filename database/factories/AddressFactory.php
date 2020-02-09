<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'addressesble_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'addressesble_type' => 'str', //todo fazer enum
        'address' => $faker->address,
        'complement' => $faker->streetSuffix,
        'city_id' => 1 ,  //todo city id
        'country_id' => 1, //todo
        'latitude' => $faker->latitude,
        'longitude' => $faker->longitude
    ];
});
