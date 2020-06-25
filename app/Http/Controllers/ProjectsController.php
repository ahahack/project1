<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Project;
use App\Service;

class ProjectsController extends Controller {

	public function index(Project $project, Service $service) {

		$projects = Project::all()->sortDesc();
		$services = Service::all();

		return view('projects.index', compact('projects', 'project', 'service', 'services'));
	}

	public function show(Project $project) {

		return view('projects.show', compact('project'));
	}

	public function create() {
		return redirect('projects');
	}

	public function store() {
		return redirect('projects');
	}

	public function edit() {
		return redirect('projects');
	}

	public function update() {
		return redirect('projects');
	}

	public function destroy() {
		return redirect('projects');
	}
}
