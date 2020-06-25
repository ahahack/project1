@extends('layouts.app')

@section('title', 'Edit category: ' . $category->name)

@section('content')
<div class="container">
	<div class="row">
		<div class="col-12">
			<h1>Edit category: {{ $category->name }}</h1>
		</div>
	</div>

	<div class="row">
		<div class="col-12">
			<form action="/admin/categories/{{ $category->id }}" method="POST" enctype="multipart/form-data" class="pb-3">
				@include('admin.categories.form')
				@method('PATCH')

				<div class="d-flex justify-content-end mt-4">
					<div class="p-0 m-0"><a class="btn btn-secondary mr-1" href="/admin/categories">Back to List</a></div>
					<div class="p-0 m-0"><button class="btn btn-primary" type="submit">Save Category</button></div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
