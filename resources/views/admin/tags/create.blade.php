@extends('layouts.app')

@section('title')
	Create New Tag
@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-12">
			<h1>Add New Tag</h1>
		</div>
	</div>

	<div class="row">
		<div class="col-12">
			<form action="/admin/tags" method="POST" enctype="multipart/form-data" class="pb-3">
				@include('admin.tags.form')

				<button class="mt-3 btn btn-primary" type="submit">Add Tag</button>
				@csrf
			</form>
		</div>
	</div>
</div>
@endsection
