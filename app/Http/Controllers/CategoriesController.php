<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Http\Controllers\Controller;
use App\Tag;

class CategoriesController extends Controller {

	public function index() {
		$articles = Article::all()->SortDesc();
		$categories = Category::all()->SortDesc();
		$tags = Tag::all()->SortDesc();

		return redirect('articles');
	}

	public function create() {
		return redirect('categories');
	}

	public function store() {
		return redirect('categories');
	}
	public function edit() {
		return redirect('categories');
	}

	public function update() {
		return redirect('categories');
	}

	public function destroy() {
		return redirect('categories');
	}

	public function show(Category $category, Article $article) {
		$articles = Article::all()->sortDesc();
		$categories = Category::all()->SortDesc();
		$tags = Tag::all()->SortDesc();

		return view('categories.show', compact('articles', 'categories', 'category', 'tags'));
	}
}
