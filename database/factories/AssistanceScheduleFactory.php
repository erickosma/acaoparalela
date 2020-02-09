<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\AssistanceSchedule;
use Faker\Generator as Faker;

$factory->define(AssistanceSchedule::class, function (Faker $faker) {
    return [
        'assistance_id' => function () {
            return factory(App\Assistance::class)->create()->id;
        },
        'schedule' => $faker->dateTime
    ];
});
