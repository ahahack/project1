@extends('layouts.app')

@section('title', 'Edit service:' . $service->name)

@section('content')
<div class="container">
	<div class="row">
		<div class="col-12">
			<h1>Edit service: {{ $service->name }}</h1>
		</div>
	</div>

	<div class="row">
		<div class="col-12">
			<form action="/admin/services/{{ $service->id }}" method="POST" enctype="multipart/form-data" class="pb-3">
				@include('admin.services.form')
				@method('PATCH')

				<div class="d-flex justify-content-end mt-4">
					<div class="p-0 m-0"><a class="btn btn-secondary mr-1" href="/admin/services">Back to List</a></div>
					<div class="p-0 m-0"><button class="btn btn-primary" type="submit">Save Service</button></div>

				</div>
			</form>
		</div>
	</div>
</div>
@endsection
