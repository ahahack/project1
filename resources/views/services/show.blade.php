@extends('layouts.app')

@section('title')
    Service: {{ $service->name }}
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <img class="w-100" src="{{ asset('storage/' . $service->image) }}">
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h1 class="mt-4">Service: {{ $service->name }}</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12 font-italic">
            <div class="p-3 my-3 bg-dark text-white">
                <p class="p-0 m-0"><a class="text-white" href="/">Home</a> / <a class="text-white" href="/services">Services</a> / {{ $service->name }}</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <p class="mt-2">{!! $service->description !!}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h3 class="mt-3">Related projects</h3>
        </div>
    </div>

    <div class="row">
        @foreach ($service->projects as $project)
            <div class="col-4 bg-white m-0 p-3">
                <a href="/projects/{{ $project->id }}">
                    <div>
                        <img class="w-100" src="{{ asset('storage/' . $project->image) }}">
                        <h4 class="mt-3">{{ $project->title }}</h4>
                    </div>
                </a>
            </div>
        @endforeach
    </div>


</div>
@endsection
