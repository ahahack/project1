<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use App\Http\Controllers\Controller;
use App\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller {
	public function index() {
		$articles = Article::all()->SortDesc();
		$categories = Category::all()->SortDesc();
		$tags = Tag::all()->SortDesc();

		return view('admin.tags.index', compact('categories', 'articles', 'tags'));
	}

	public function create(Article $article) {
		$tag = new Tag();

		return view('admin.tags.create', compact('tag', 'article'));
	}

	public function store() {
		$tag = Tag::create($this->validateRequest());

		return redirect('admin/tags');
	}

	public function show(Tag $tag, Article $article) {
		$articles = Article::all()->sortDesc();
		$categories = Category::all()->SortDesc();
		$tags = Tag::all()->SortDesc();

		return view('admin.tags.show', compact('articles', 'categories', 'tags', 'tag'));
	}

	public function edit(Tag $tag) {
		$tags = Tag::all();

		return view('admin.tags.edit', compact('tag'));
	}

	public function update(Tag $tag) {
		$tag->update($this->validateRequest());

		return redirect('admin/tags/' . $tag->id . '/edit');
	}

	public function destroy(Tag $tag) {
		$tag->delete();

		return redirect('admin/tags');
	}

	private function validateRequest() {

		return request()->validate([
			'name' => 'required|min:3',
		]);
	}
}
