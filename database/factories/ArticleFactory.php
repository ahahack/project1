<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
	return [
		'image' => 'uploads/cover.jpeg',
		'category_id' => $faker->randomDigitNotNull,
		'title' => $faker->realText($maxNbChars = 70, $indexSize = 3),
		'subtitle' => $faker->realText($maxNbChars = 120, $indexSize = 2),
		'content' => '<p>' . $faker->paragraphs($nb = 3, $asText = true) . '</p>' . '<p><img src="/storage/uploads/picsum2.jpg" alt="" width="100%" /></p>' . '<p>' . $faker->paragraphs($nb = 5, $asText = true) . '</p>' . '<p>' . $faker->paragraphs($nb = 2, $asText = true) . '</p>' . '<p><img src="/storage/uploads/project.jpg" alt="" width="100%" /></p>',
		'popular' => $faker->boolean,
		'active' => 1,
	];
});
