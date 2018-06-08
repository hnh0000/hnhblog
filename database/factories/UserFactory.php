<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\User::class, function (Faker $faker) {
    $created_at = $faker->dateTimeThisMonth();
    $updated_at = $faker->dateTimeThisMonth($created_at);

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'remember_token' => str_random(10),
        'open_id' => str_random(30),
        'created_at' => $created_at,
        'updated_at' => $updated_at
    ];
});
