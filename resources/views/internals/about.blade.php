@extends('layouts.app')

@section('title')
    About Us | Project1
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <img class="w-100" src="/storage/uploads/about.jpg">
            <h1 class="mt-4">About</h1>

            <div class="row">
                <div class="col-12 font-italic">
                    <div class="p-3 my-3 bg-dark text-white">
                        <p class="p-0 m-0"><a class="text-white" href="/">Home</a> / About us</p>
                    </div>
                </div>
            </div>

            <p>My name is Bogdan and that's my portfolio webite. I've been working on the digital marketing field for 5+ years and it gave me tons of experience and useful knowledge. Our professional team of enthusiasts provides the whole specter of digital marketing <a href="/services">services</a>:</p>
            <ul>
                <li>creating amazing videos for your customers</li>
                <li>copywriting of awesome texts that do sell</li>
                <li>web and pdf presentations design</li>
                <li>creating websites for your brand, products or services</li>
                <li>content management on your websites and more!</li>
            </ul>
            <p>Here you can get acquinted with our team's works and <a href="/contact">contact us</a> if you need further information or a consultation on your <a href="/projects">project</a>!</p>
        </div>
    </div>

    <div class="row my-3">
        <div class="col-12">
            <h2>Services</h2>
        </div>
    </div>

    <div class="row">
        @foreach ($services as $service)
            <div class="col-4">
                <a href="/services/{{ $service->id }}">
                    <p><img class="w-100" src="{{ asset('/storage/' . $service->image) }}"></p>
                    <h3>{{ $service->name }}</h3>
                </a>
            </div>
        @endforeach
    </div>
    <div class="row my-4">
        <div class="col-12 d-flex justify-content-center">
            <a href="/services"><div class="btn btn-secondary btn-lg mx-2">See all services</div></a>
        </div>
    </div>

    <div class="row my-3">
        <div class="col-12">
            <h2>Our projects</h2>
        </div>
    </div>

    <div class="row">
        @foreach ($project as $project)
            <div class="col-6 mb-3">
                <a href="/projects/{{ $project->id }}">
                    <p><img class="w-100" src="{{ asset('/storage/' . $project->image) }}"></p>
                    <h5>{{ $project->title }}</h5>
                </a>
            </div>
        @endforeach
    </div>
    <div class="row my-4">
        <div class="col-12 d-flex justify-content-center">
            <a href="/projects"><div class="btn btn-primary btn-lg mx-2">All projects</div></a>
            <a href="/contact"><div class="btn btn-secondary btn-lg mx-2">Contact us</div></a>
        </div>
    </div>

</div>
@endsection
