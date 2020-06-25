<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use App\Http\Controllers\Controller;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ArticlesController extends Controller {

	public function index() {

		$articles = Article::latest('id')->paginate(10);

		return view('admin.articles.index', compact('articles'));
	}

	public function create(Article $article) {

		$article = new Article();
		$categories = Category::all();
		$tags = Tag::all();

		return view('admin.articles.create', compact('categories', 'article', 'tags'));
	}

	public function store(Request $request) {

		$article = Article::create($this->validateRequest());

		$this->storeImage($article);

		if (isset($request->tags)) {
			$article->tags()->sync(request()->tags);
		} else {
			$article->tags()->sync(array());
		}

		return redirect('admin/articles');
	}

	public function show(Article $article) {
		$categories = Category::all();
		$tags = Tag::all();
		$user = User::all();

		return view('admin.articles.show', compact('article', 'user', 'tags'));
	}

	public function edit(Article $article) {

		$categories = Category::all();
		$users = User::all();
		$tags = Tag::all();
		$tags2 = array();
		foreach ($tags as $tag) {
			$tags2[$tag->id] = $tag->name;
		}

		return view('admin.articles.edit', compact('article', 'categories', 'tags', 'tags2', 'users'));
	}

	public function update(Article $article, Request $request) {

		$article->update($this->validateRequest());

		$this->storeImage($article);

		$article->tags()->sync($request->tags);

		return redirect('admin/articles/' . $article->id . '/edit');
	}

	public function destroy(Article $article) {
		$article->delete();

		$article->tags()->detach();

		return redirect('/admin/articles');
	}

	private function validateRequest() {

		return tap(request()->validate([
			'title' => 'required',
			'subtitle' => 'required',
			'content' => 'required',
			'active' => 'required',
			'popular' => 'required',
			'category_id' => 'required',

		]), function () {

			if (request()->hasFile('image')) {
				request()->validate([
					'image' => 'required|image|max:5000',
				]);
			}
		});
	}

	private function storeImage($article) {

		if (request()->hasFile('image')) {
			$article->update([
				'image' => request()->image->store('uploads', 'public'),
			]);

			$image = Image::make(public_path('storage/' . $article->image))->fit(1600, 600, null);
			$image->save();

		}
	}
}
