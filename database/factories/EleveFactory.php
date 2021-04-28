<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Eleve;
use App\Etablissement;
use App\Restaurant;
use App\Foyer;
use App\Gouvernerat;
use App\Dossiers_médicales;

use Faker\Generator as Faker;

$factory->define(Eleve::class, function (Faker $faker) {
    $gender = $faker->randomElement(['male', 'female']);
    return [
        'name_fr' => $faker->name($gender),
        'name_ar' => $faker->name($gender),
        'email'   => $faker->freeEmail,
        'sexe' => $gender,
        'naissance_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'naissance_lieu' => $faker->state,
        'adresse' => $faker->address,
        'nbr_fréres' => $faker->randomDigit,
        'nationalité' => $faker->state,
        'entré_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'nom_pére' => $faker->name,
        'codepost_pére' => $faker->postcode,
        'tél_pére' => $faker->phoneNumber,
        'nom_mére' => $faker->name,
        'codepost_mére' => $faker->postcode,
        'tél_mére' => $faker->phoneNumber,
        'etabliss_id' => Etablissement::get('id')->random(),
        'restaurant_id' =>Restaurant::get('id')->random(),
        'foyer_id' => Foyer::get('id')->random(),
        'gouv_id' => Gouvernerat::get('id')->random(),
        'dossmed_id' => Dossiers_médicales::get('id')->random()
          


    ];
});
