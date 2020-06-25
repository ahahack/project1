@extends('layouts.app')

@section('title')
    Portfolio - Projects
@endsection

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-12">
                <h1>Projects</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-12 font-italic">
                <div class="p-3 my-3 bg-dark text-white">
                    <p class="p-0 m-0"><a class="text-white" href="/">Home</a> / Projects</p>
                </div>
            </div>
        </div>

        @foreach ($services as $service)
            <div class="row mt-3">
                <div class="col-12">
                    <h3>{{ $service->name }}</h3>
                </div>
            </div>

            <div class="row">
                @foreach ($service->projects as $project)
                    <div class="col-4 bg-white m-0 p-3">
                        <a href="projects/{{ $project->id }}">
                            <div>
                                <img class="w-100" src="{{ asset('storage/' . $project->image) }}">
                                <h4 class="mt-3">{{ $project->title }}</h4>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

        @endforeach
    </div>
@endsection
