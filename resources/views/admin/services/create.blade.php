@extends('layouts.app')

@section('title')
	Create New Service
@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-12">
			<h1>Add New Service</h1>
		</div>
	</div>

	<div class="row">
		<div class="col-12">
			<form action="/admin/services" method="POST" enctype="multipart/form-data" class="pb-3">
				@include('admin.services.form')

				<button class="mt-3 btn btn-primary" type="submit">Add Service</button>
				@csrf
			</form>
		</div>
	</div>
</div>
@endsection
