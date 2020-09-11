<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Models\Customer::class, function (Faker\Generator $faker) {
    return [
        'email' => $faker->email,
        'first_name' => $faker->name,
        'last_name' => $faker->name,
        'store_credit' => $faker->randomNumber($nbDigits = 4),
    ];
});

$factory->define(App\Models\Item::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text,
        'price' => $faker->randomNumber($nbDigits = 3),
    ];
});

