<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Http\Controllers\Controller;
use App\Tag;
use App\User;

class ArticlesController extends Controller {

	public function index(Article $article) {
		$tags = Tag::all()->SortDesc();
		$article = Article::all();
		$articles = Article::latest('id')->paginate(3);

		$categories = Category::all()->SortDesc();

		return view('articles.index', compact('articles', 'article', 'categories', 'tags'));
	}

	public function show(Article $article) {
		$categories = Category::all();
		$tags = Tag::all();
		$user = User::all();

		return view('articles.show', compact('article', 'user', 'tags'));
	}

	public function create() {
		return redirect('articles');
	}

	public function store() {
		return redirect('articles');
	}

	public function edit() {
		return redirect('articles');
	}

	public function update() {
		return redirect('articles');
	}

	public function destroy() {
		return redirect('articles');
	}
}
