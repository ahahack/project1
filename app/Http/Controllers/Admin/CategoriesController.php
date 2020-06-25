<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use App\Http\Controllers\Controller;
use App\Tag;
use Illuminate\Http\Request;

class CategoriesController extends Controller {
	public function index() {
		$articles = Article::all()->SortDesc();
		$categories = Category::all()->SortDesc();
		$tags = Tag::all()->SortDesc();

		return view('admin.categories.index', compact('categories', 'articles', 'tags'));
	}

	public function create(Article $article) {
		$category = new Category();

		return view('admin.categories.create', compact('category', 'article'));
	}

	public function store() {
		$category = Category::create($this->validateRequest());

		return redirect('admin/categories');
	}

	public function show(Category $category, Article $article) {
		$articles = Article::all()->sortDesc();
		$categories = Category::all()->SortDesc();
		$tags = Tag::all()->SortDesc();

		return view('admin.categories.show', compact('articles', 'categories', 'category', 'tags'));
	}

	public function edit(Category $category) {
		$categories = Category::all();

		return view('admin.categories.edit', compact('category'));
	}

	public function update(Category $category) {
		$category->update($this->validateRequest());

		return redirect('admin/categories/' . $category->id . '/edit');
	}

	public function destroy(Category $category) {
		$category->delete();

		return redirect('admin/categories');
	}

	private function validateRequest() {

		return request()->validate([
			'name' => 'required|min:10',
		]);
	}
}
