<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
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

$factory->define(User::class, function (Faker $faker) {
	return [
		'name' => 'Bogdan Sy',
		'email' => 'b.syniachenko@gmail.com',
		'email_verified_at' => now(),
		'about' => 'Laravel 7, Yii2, Vue.js',
		'image' => '/uploads/default.jpg',
		'password' => bcrypt('1234567890'), // password
		'remember_token' => Str::random(10),
	];
});
