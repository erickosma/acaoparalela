<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SysOccupationArea;
use Faker\Generator as Faker;

$factory->define(SysOccupationArea::class, function (Faker $faker) {
    return [
        'name' => $faker->colorName
    ];
});
