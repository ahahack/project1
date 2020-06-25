@extends('layouts.app')

@section('title')
	Create New Article
@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-12">
			<h1>Add New Article</h1>
		</div>
	</div>

	<div class="row">
		<div class="col-12">
			<form action="/admin/articles" method="POST" enctype="multipart/form-data" class="pb-3">
				@include('admin.articles.form')

				<button class="mt-3 btn btn-primary" type="submit">Add Article</button>
			</form>
		</div>
	</div>
</div>
@endsection


