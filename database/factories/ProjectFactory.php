<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
	return [
		'image' => 'uploads/picsum2.jpg',
		'title' => $faker->realText($maxNbChars = 70, $indexSize = 3),
		'service_id' => $faker->numberBetween($min = 1, $max = 7),
		'price' => '$$$',
		'duration' => '1 week',
		'website' => 'https:/ruta.family',
		'description' => '<p>' . $faker->paragraphs($nb = 3, $asText = true) . '</p>' . '<p>' . $faker->paragraphs($nb = 5, $asText = true) . '</p>' . '<p><img src="/storage/uploads/picsum.jpg" alt="" width="100%" /></p>' . '<p>' . $faker->paragraphs($nb = 5, $asText = true) . '</p>' . '<p>' . $faker->paragraphs($nb = 4, $asText = true) . '</p>',
	];
});
