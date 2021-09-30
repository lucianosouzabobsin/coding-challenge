<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\PersonalRecord;
use Faker\Generator as Faker;

$factory->define(PersonalRecord::class, function (Faker $faker) {
    return [
        'user_id' => $faker->randomDigit,
        'movement_id' => $faker->randomDigit,
        'value' => $faker->randomFloat(2, 0, 1),
        'date' => $faker->dateTime
    ];
});
