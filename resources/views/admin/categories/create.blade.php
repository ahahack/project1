@extends('layouts.app')

@section('title')
	Create New Category
@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-12">
			<h1>Add New Category</h1>
		</div>
	</div>

	<div class="row">
		<div class="col-12">
			<form action="/admin/categories" method="POST" enctype="multipart/form-data" class="pb-3">
				@include('admin.categories.form')

				<button class="mt-3 btn btn-primary" type="submit">Add Category</button>
				@csrf
			</form>
		</div>
	</div>
</div>
@endsection
