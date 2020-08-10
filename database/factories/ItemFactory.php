<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Item;
use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {
    return [
        'name' => $faker->lastName . ' ' . $faker->colorName,
        'stock' => $faker->numberBetween($min = 1, $max = 100),
    ];
});
