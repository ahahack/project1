@extends('layouts.app')

@section('title')
    My First Laravel Project | Project1
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <img class="w-100" src="/storage/uploads/home.jpg">
            <h1 class="mt-4">Homepage</h1>
            <p class="mt-2">My name is Bogdan and that's my portfolio webite. I've been working on the digital marketing field for 5+ years and it gave me tons of experience and useful knowledge. Our professional team of enthusiasts provides the whole specter of digital marketing <a href="/services">services</a>:</p>
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
            <a href="/projects"><div class="btn btn-primary btn-lg mx-2">See all projects</div></a>
        </div>
    </div>

    <div class="row my-3">
        <div class="col-12">
            <h2>New in blog</h2>
        </div>
    </div>

    <div class="row">
        @foreach ($articles as $article)
            <div class="col-4 mb-3">
                <a href="/articles/{{ $article->id }}">
                    <p><img class="w-100" src="{{ asset('/storage/' . $article->image) }}"></p>
                    <h5>{{ $article->title }}</h5>
                    </a>
                    <div class="d-flex">
                        @foreach ($article->tags as $tag)
                            <a class="badge badge-light mr-1" href="/tags/{{ $tag->id }}"># {{ $tag->name }}</a>
                        @endforeach
                    </div>
                    <p class="mt-2">{{ substr(strip_tags($article->content), 0, 150) }}{{ strlen(strip_tags($article->content)) > 150 ? "..." : "" }}</p>
                    <p><a href="/articles/{{ $article->id }}">Read more >>></a></p>

            </div>
        @endforeach
    </div>
    <div class="row my-4">
        <div class="col-12 d-flex justify-content-center">
            <a href="/articles"><div class="btn btn-primary btn-lg mx-2">Go to blog</div></a>
        </div>
    </div>


</div>
@endsection
