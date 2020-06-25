<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ServicesController extends Controller {

	public function index(Service $service) {

		$services = Service::latest('id')->paginate(10);

		return view('admin.services.index', compact('service', 'services'));
	}

	public function create(Service $service) {

		$service = new Service();

		return view('admin.services.create', compact('service'));
	}

	public function store(Request $request) {

		$servive = Service::create($this->validateRequest());

		$this->storeImage($article);

		return redirect('admin/services');
	}

	public function show(Service $service) {

		return view('admin.services.show', compact('service'));
	}

	public function edit(Service $service) {
		$services = Service::all();

		return view('admin.services.edit', compact('service'));
	}

	public function update(Request $request, Service $service) {

		$service->update($this->validateRequest());

		$this->storeImage($article);

		return redirect('admin/services/' . $service->id . '/edit');
	}

	public function destroy(Service $service) {
		$service->delete();

		return redirect('admin/services');
	}

	private function validateRequest() {

		return tap(request()->validate([
			'name' => 'required|min:3',
			'description' => 'required',
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
