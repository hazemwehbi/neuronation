<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\CourseSession;
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

$factory->define(CourseSession::class, function (Faker $faker) {
	$date = $faker->dateTimeBetween('-2 months', 'now');
    
    return [ 
            'course_id' => rand(1,5), 
            'user_id' => rand(2, 100),
            'score' => rand(0, 100), 
            'created_at' => $date, 
            'updated_at' => $date,
        ];
});
