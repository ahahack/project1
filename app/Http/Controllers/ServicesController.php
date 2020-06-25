<?php

namespace App\Http\Controllers;

use App\Service;

class ServicesController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

		$services = Service::all();

		return view('services.index', compact('services'));
	}

	public function about() {
		$services = Service::all();

		return view('internals.about', compact('services'));
	}

	public function show(Service $service) {

		return view('services.show', compact('service'));
	}

	public function create() {
		return redirect('services');
	}

	public function store() {
		return redirect('services');
	}

	public function edit() {
		return redirect('services');
	}

	public function update() {
		return redirect('services');
	}

	public function destroy() {
		return redirect('services');
	}
}
