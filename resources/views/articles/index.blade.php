@extends('layouts.app')

@section('title')
    Blog
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="mt-2">Blog</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9 mb-5">
            @foreach ($articles as $article)
                <div class="mt-3 mb-4">
                    @if ($article->image)
                        <a href="/articles/{{ $article->id }}"><img src="{{ asset('storage/' . $article->image) }}" class="w-100 pb-3"></a>
                    @endif
                    <h4><a href="/articles/{{ $article->id }}">{{ $article->title }}</a></h4>

                    <div class="d-flex">
                        @foreach ($article->tags as $tag)
                            <a class="badge badge-light mr-1" href="/tags/{{ $tag->id }}"># {{ $tag->name }}</a>
                        @endforeach
                    </div>

                    <p class="mt-2">{{ substr(strip_tags($article->content), 0, 300) }}{{ strlen(strip_tags($article->content)) > 300 ? "..." : "" }}</p>
                    <p><a href="/articles/{{ $article->id }}">Read more >>></a></p>
                </div>
            @endforeach

            <div class="d-flex justify-content-center pt-5">
                {{ $articles->links() }}
            </div>

        </div>
        <div class="col-md-3 mt-3">
            <h3 class="bg-dark p-2 text-light">Categories</h3>
            <ul class="p-1">
                @foreach ($categories as $category)
                    <li class="list-unstyled pt-1"><a href="/categories/{{ $category->id }}">{{ $category->name }} ({{ $category->articles->count('articles') }})</a></li>
                @endforeach
            </ul>
            <h3 class="bg-dark p-2 text-light">Popular</h3>
            <ul class="p-1">
                @foreach ($articles as $article)
                    @if ($article->popular == '1')
                        <li class="list-inline-item pt-1"><a href="/articles/{{ $article->id }}">{{ $article->title}}</a></li>
                    @endif
                @endforeach
            </ul>
            <h3 class="bg-dark p-2 text-light">Tags</h3>
            <ul class="p-1">
                @foreach ($tags as $tag)
                    <li class="list-inline-item"><a href="/tags/{{ $tag->id }}">{{ $tag->name }} ({{ $tag->articles->count('articles') }})</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
