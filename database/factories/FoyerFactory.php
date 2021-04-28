<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Foyer;
use Faker\Generator as Faker;

$factory->define(Foyer::class, function (Faker $faker) {
    return [
        'nom' => $faker->name
    ];
});
