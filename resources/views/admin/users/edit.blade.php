@extends('layouts.app')

@section('title', 'Edit Details for ' . $user->name)

@section('content')
<div class="container">
	<div class="row">
		<div class="col-12">
			<h1>Edit Details for {{ $user->name }}</h1>
		</div>
	</div>

	<div class="row">
		<div class="col-12">
			<form action="{{ route('admin.users.update', ['user' => $user]) }}" enctype="multipart/form-data" method="POST" class="pb-3">
				@include('admin.users.form')
				@method('PATCH')

				<div class="d-flex justify-content-end">
					<button class="mt-3 btn btn-primary" type="submit">Save user</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
