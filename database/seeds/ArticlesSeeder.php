<?php

use Illuminate\Database\Seeder;

class ArticlesSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		factory(\App\Article::class, 20)->create();

		DB::table('article_tag')->insert([
			['article_id' => '1',
				'tag_id' => '1'],
			['article_id' => '1',
				'tag_id' => '2'],
			['article_id' => '1',
				'tag_id' => '3'],
			['article_id' => '2',
				'tag_id' => '1'],
			['article_id' => '2',
				'tag_id' => '4'],
			['article_id' => '2',
				'tag_id' => '5'],
			['article_id' => '20',
				'tag_id' => '6'],
			['article_id' => '20',
				'tag_id' => '7'],
			['article_id' => '20',
				'tag_id' => '8'],
			['article_id' => '19',
				'tag_id' => '5'],
			['article_id' => '19',
				'tag_id' => '1'],
			['article_id' => '19',
				'tag_id' => '4'],
			['article_id' => '18',
				'tag_id' => '9'],
			['article_id' => '17',
				'tag_id' => '9'],
			['article_id' => '16',
				'tag_id' => '9'],
			['article_id' => '15',
				'tag_id' => '9'],
			['article_id' => '14',
				'tag_id' => '9'],
			['article_id' => '13',
				'tag_id' => '9'],
			['article_id' => '12',
				'tag_id' => '9'],
		]);
	}
}
