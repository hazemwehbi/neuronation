<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\SessionExercise;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(SessionExercise::class, function (Faker $faker) {
	$date = $faker->dateTimeBetween('-2 months', 'now');

    return [
        'name' => $faker->sentence($nbWords = 3),
        'score' => rand(0, 100),
        'session_id' => rand(13, 300),
        'category_id' => rand(1, 12),
       	'created_at' => $date, 
       	'updated_at' => $date,
    ];
});
