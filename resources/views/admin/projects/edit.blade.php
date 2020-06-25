@extends('layouts.app')

@section('title', 'Project: ' . $project->title)

@section('content')
<div class="container">
	<div class="row">
		<div class="col-12">
			<h1>Project: {{ $project->title }}</h1>
		</div>
	</div>

	<div class="row">
		<div class="col-12">
			<form action="/admin/projects/{{ $project->id }}" method="POST" enctype="multipart/form-data" class="pb-3">
				@include('admin.projects.form')
				@method('PATCH')

				<div class="d-flex justify-content-end mt-5">
					<div class="p-0 m-0"><a class="btn btn-secondary mr-1" href="/admin/projects">Back to List</a></div>
					<div class="p-0 m-0"><button class="btn btn-primary" type="submit">Save Project</button></div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
