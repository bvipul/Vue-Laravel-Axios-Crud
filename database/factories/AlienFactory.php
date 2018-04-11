<?php

use Faker\Generator as Faker;

$factory->define(App\Alien::class, function (Faker $faker) {
    return [
        'name' => $faker->lexify('????????'),
        'color' => $faker->boolean ? 'red' : 'green'
    ];
});
