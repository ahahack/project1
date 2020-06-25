@extends('layouts.app')

@section('title')
    Portfolio: Services
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="mt-2">Portfolio: Services</h1>
            <a href="{{ '/admin/services/create' }}">Create New Service</a>
        </div>
    </div>
    <div class="row my-3 pt-2 bg-dark text-white">
        <div class="col-1"><h3>ID</h3></div>
        <div class="col-8"><h3>Service name</h3></div>
        <div class="col-2"><h3>Projects list</h3></div>
        <div class="col-1"><h3></h3></div>
    </div>
    @foreach ($services as $service)
        <div class="row mt-1">
            <div class="col-1"><a href="/admin/services/{{ $service->id }}/edit">{{ $service->id }}</a></div>

            <div class="col-8"><a href="/admin/services/{{ $service->id }}/edit">{{ $service->name }}</a></div>

            <div class="col-2"><a href="/admin/services/{{ $service->id }}">View all projects ({{ $service->projects->count('articles') }})</a></div>

            <div class="col-1 d-flex justify-content-center">
                <div><a class="btn btn-primary btn-sm mr-1" href="/admin/services/{{ $service->id }}/edit">Edit</a></div>

                <form action="/admin/services/{{ $service->id }}" method="POST">
                    @method('DELETE')
                    @csrf

                    <button class="btn btn-secondary btn-sm mr-1" type="submit">Delete</button>
                </form>
            </div>
        </div>
    @endforeach
    <div class="d-flex justify-content-center pt-5">
                {{ $services->links() }}
            </div>
</div>
@endsection
