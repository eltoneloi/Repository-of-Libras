<?php

use Faker\Generator as Faker;

$factory->define(App\Word::class, function (Faker $faker) {
    return [
       'word' => $faker->word(),
       'gestFile' => $faker->name()
    ];
});
