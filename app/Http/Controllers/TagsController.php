<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Http\Controllers\Controller;
use App\Tag;

class TagsController extends Controller {

	public function index() {
		$articles = Article::all()->SortDesc();
		$tags = Tag::all()->SortDesc();
		$categories = Category::all()->SortDesc();

		return redirect('articles');
	}

	public function create() {
		return redirect('tags');
	}

	public function store() {
		return redirect('tags');
	}
	public function edit() {
		return redirect('tags');
	}

	public function update() {
		return redirect('tags');
	}

	public function destroy() {
		return redirect('tags');
	}

	public function show(Tag $tag, Category $category, Article $article) {
		$articles = Article::all()->SortDesc();
		$tags = Tag::all()->SortDesc();
		$categories = Category::all()->SortDesc();

		return view('tags.show', compact('articles', 'article', 'tags', 'tag', 'categories', 'category'));
	}
}
