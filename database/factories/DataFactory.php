<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Data;
use Faker\Generator as Faker;

$factory->define(Data::class, function (Faker $faker) {
    return [
        'title' => $faker->text($maxNbChars = 32),
        'description' => $faker->text(4000)
    ];
});
