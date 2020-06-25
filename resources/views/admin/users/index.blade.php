@extends('layouts.app')

@section('title')
	Users List
@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-6">
			<h1>Users List</h1>
			<a href="users/create">Add New User</a>
		</div>
	</div>

	@foreach ($users as $user)
	<div class="row pt-3">
		<div class="col-2">
			<a href="/admin/users/{{$user->id}}/edit">{{ $user->id }}</a>
		</div>
		<div class="col-3">
			<a href="/admin/users/{{$user->id}}/edit">{{ $user->name }}</a>
		</div>
		<div class="col-3">
			<a href="/admin/users/{{$user->id}}/edit">{{ $user->email }}</a>
		</div>
		<div class="col-2">
			<a href="/admin/users/{{$user->id}}/edit">{{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}</a>
		</div>
		<div class="col-2 d-flex justify-content-center">
			<div><a class="btn btn-primary btn-sm mr-1" href="/admin/users/{{ $user->id }}/edit">Edit</a></div>

            <form action="/admin/users/{{ $user->id }}" method="POST">
                @method('DELETE')
                @csrf

                <button class="btn btn-secondary btn-sm mr-1" type="submit">Delete</button>
            </form>
		</div>
	</div>
	@endforeach

</div>
@endsection