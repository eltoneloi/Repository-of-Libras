<?php

use Faker\Generator as Faker;

$factory->define(App\Context::class, function (Faker $faker) {
    return [
       'contDescription' => $faker->realText(40),
       'contName' => $faker->name()
    ];
});
