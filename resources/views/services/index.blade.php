@extends('layouts.app')

@section('title')
    Portfolio - Services
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Services</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12 font-italic">
            <div class="p-3 my-3 bg-dark text-white">
                <p class="p-0 m-0"><a class="text-white" href="/">Home</a> / Services</p>
            </div>
        </div>
    </div>

    <div class="row">
        @foreach ($services as $service)
            <div class="col-6 my-3">
                <a href="/services/{{ $service->id }}">
                    <p><img class="w-100" src="{{ asset('storage/' . $service->image) }}"></p>
                    <h3>{{ $service->name }}</h3>
                </a>
            </div>
        @endforeach
    </div>

</div>
@endsection
