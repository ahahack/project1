@extends('layouts.app')

@section('title')
	Create New Project
@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-12">
			<h1>Add New Project</h1>
		</div>
	</div>

	<div class="row">
		<div class="col-12">
			<form action="/admin/projects" method="POST" enctype="multipart/form-data" class="pb-3">
				@include('admin.projects.form')

				<button class="mt-3 btn btn-primary" type="submit">Add Project</button>
			</form>
		</div>
	</div>
</div>
@endsection


