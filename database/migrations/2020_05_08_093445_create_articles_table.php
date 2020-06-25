<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('articles', function (Blueprint $table) {
			$table->id();
			$table->unsignedInteger('category_id');
			$table->unsignedInteger('user_id')->default('1');
			$table->unsignedInteger('tag_id')->nullable();
			$table->string('image')->nullable();
			$table->string('title');
			$table->string('subtitle');
			$table->longtext('content');
			$table->integer('popular');
			$table->integer('active');

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('articles');
	}
}
