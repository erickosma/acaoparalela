<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SysManualOccupationArea;
use Faker\Generator as Faker;

$factory->define(SysManualOccupationArea::class, function (Faker $faker) {
    return [
        'name' => $faker->colorName
    ];
});
