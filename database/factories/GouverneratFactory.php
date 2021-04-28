<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Gouvernerat;
use Faker\Generator as Faker;

$factory->define(Gouvernerat::class, function (Faker $faker) {
    return [
        'nom' => $faker->name
    ];
});
