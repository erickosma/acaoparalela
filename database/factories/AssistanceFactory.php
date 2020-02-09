<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Assistance;
use Faker\Generator as Faker;

$factory->define(Assistance::class, function (Faker $faker) {
    $sysOccupation = (rand(0,1) == 0) ?  function () {
        return factory(App\SysOccupationArea::class)->create()->id;
    }  : null;

    $manual = is_null($sysOccupation) ? $faker->name : null;
    return [
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'title' => $faker->title,
        'description' => $faker->paragraph,
        'sys_occupation_areas_id' => $sysOccupation,  //return sys or null
        'type' => 'str', //todo  enum
        'manual' => $manual
    ];
});
