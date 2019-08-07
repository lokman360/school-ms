<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Student;
use Illuminate\Support\Str;
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

$factory->define(Student::class, function (Faker $faker) {
    return [
        'st_name' => $faker->name,
        'st_f_name' => $faker->name,
        'st_m_name' => $faker->name,
        'st_phone' => $faker->phoneNumber,
        'st_email' => $faker->unique()->safeEmail,
        'st_present_add' => $faker->city,
        'st_permanent_add' => $faker->city,
        'st_class' => $faker->numberBetween($min = 1, $max = 10),
        'st_section' => $faker->numberBetween($min = 1, $max = 10),
        'st_session' => $faker->numberBetween($min = 1, $max = 10),
        'st_roll_no' => $faker->numberBetween($min = 1, $max = 10),
    ];
});
