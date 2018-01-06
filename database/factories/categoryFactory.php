<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'catDescription' => $faker->name(),
        'catName' => $faker->name()
        //'context_id' => 
    ];
});
