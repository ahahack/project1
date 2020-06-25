@extends('layouts.app')

@section('title', $project->name)

@section('content')
<div class="container">
	<div class="row">
		<div class="col-12">
			@if ($project->image)
			<p><img src="{{ asset('storage/' . $project->image) }}" class="w-100"></p>
			@endif
		</div>
	</div>

	<div class="row my-1">
		<div class="col-12">
			<h1>{{ $project->title }}</h1>
			{{-- <h1>Ruta Family Club Hotel</h1> --}}
			<h5 class="mt-3"><strong>Service:</strong> {{ $project->service->name }}</h5>
			<h5><strong>Price:</strong> {{ $project->price }}</h5>
			<h5><strong>Duration:</strong> {{ $project->duration }}</h5>
			<h5><strong>Website:</strong> <a href="{{ $project->website }}" target="_blank">{{ $project->website }}</a></h5>

		</div>
	</div>

	<div class="row">
		<div class="col-12">
			<p>{!! $project->description !!}</p>
		</div>
	</div>

	<div class="row d-flex justify-content-end mt-4">
                    <div class="p-0 m-0"><a class="btn btn-secondary mr-1" href="/admin/projects">Back to List</a></div>
                </div>

</div>
@endsection
