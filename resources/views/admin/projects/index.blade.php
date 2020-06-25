@extends('layouts.app')

@section('title')
    Projects
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="mt-2">Projects</h1>
            <a href="{{ '/admin/projects/create' }}">Create New Project</a>
        </div>
    </div>
    <div class="row my-3 pt-2 bg-dark text-white">
        <div class="col-1"><h3>ID</h3></div>
        <div class="col-7"><h3>Project title</h3></div>
        <div class="col-2"><h3>Service</h3></div>
        <div class="col-2"><h3></h3></div>
    </div>
    @foreach ($projects as $project)
        <div class="row mt-2">
            <div class="col-1"><a href="/admin/projects/{{ $project->id }}/edit">{{ $project->id }}</a></div>

            <div class="col-7"><a href="/admin/projects/{{ $project->id }}/edit">{{ $project->title }}</a></div>

            <div class="col-2"><a href="/admin/services/{{ $project->service->id }}">{{ $project->service->name }}</a></div>

            <div class="col-2 d-flex justify-content-center">
                <div><a class="btn btn-primary btn-sm mr-1" href="/admin/projects/{{ $project->id }}/edit">Edit</a></div>

                <form action="/admin/projects/{{ $project->id }}" method="POST">
                    @method('DELETE')
                    @csrf

                    <button class="btn btn-secondary btn-sm mr-1" type="submit">Delete</button>
                </form>

                <div><a class="btn btn-dark btn-sm mr-1" href="/admin/projects/{{ $project->id }}">Preview</a></div>
            </div>
        </div>
    @endforeach
    <div class="d-flex justify-content-center pt-5">
                {{ $projects->links() }}
            </div>
</div>
@endsection