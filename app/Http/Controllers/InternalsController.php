<?php

namespace App\Http\Controllers;

use App\Article;
use App\Project;
use App\Service;
use App\Tag;

class InternalsController extends Controller {

	public function home() {
		$services = Service::all();
		$project = Project::all()->random(2);
		$articles = Article::latest('id')->paginate(3);
		$tags = Tag::all();

		return view('internals.home', compact('services', 'project', 'articles', 'tags'));
	}

	public function about() {
		$services = Service::oldest('id')->paginate(3);
		$project = Project::all()->random(2);

		return view('internals.about', compact('services', 'project'));
	}
}
