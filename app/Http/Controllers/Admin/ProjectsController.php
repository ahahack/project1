<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Project;
use App\Service;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProjectsController extends Controller {

	public function index(Project $project, Service $service) {

		$projects = Project::latest('id')->paginate(10);
		$services = Service::all();

		return view('admin.projects.index', compact('projects', 'project', 'service', 'services'));
	}

	public function create(Service $service) {
		$project = new Project();
		$services = Service::all();

		return view('admin.projects.create', compact('project', 'service', 'services'));
	}

	public function store() {

		$project = Project::create($this->validateRequest());

		$this->storeImage($project);

		return redirect('admin/projects/' . $project->id . '/edit');
	}

	public function show(Project $project) {

		return view('admin.projects.show', compact('project'));
	}

	public function edit(Project $project) {

		$services = Service::all();

		return view('admin.projects.edit', compact('project', 'services'));
	}

	public function update(project $project) {

		$project->update($this->validateRequest());

		$this->storeImage($project);

		return redirect('admin/projects/' . $project->id . '/edit');
	}

	public function destroy(project $project) {
		$project->delete();

		return redirect('admin/projects');
	}

	private function validateRequest() {

		return tap(request()->validate([
			'title' => 'required',
			'service_id' => 'required',
			'description' => 'required',
			'duration' => 'required',
			'price' => 'required',
			'website' => 'required',

		]), function () {

			if (request()->hasFile('image')) {
				request()->validate([
					'image' => 'required|image|max:5000',
				]);
			}

		});

	}

	private function storeImage($project) {

		if (request()->hasFile('image')) {
			$project->update([
				'image' => request()->image->store('uploads', 'public'),
			]);

			$image = Image::make(public_path('storage/' . $project->image))->fit(1600, 600, null);
			$image->save();

		}
	}
}
