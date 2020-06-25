@extends('layouts.app')

@section('title')
    Blog - Categories
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="mt-2">Categories</h1>
            <a href="{{ 'categories/create' }}">Create New Category</a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-9 mb-5">
            <ol class="p-0 m-0 text-uppercase">
                @foreach ($categories as $category)
                    <li class="list-group-item"><a href="/categories/{{ $category->id }}">{{ $category->name }}</a></li>
                @endforeach
            </ol>
        </div>
        <div class="col-md-3">
            <h3 class="bg-dark p-2"><a class="text-light" href="/categories">Categories</a></h3>
            <ul class="p-1">
                @foreach ($categories as $category)
                    <li class="list-inline-item pt-1"><a href="/categories/{{ $category->id }}">{{ $category->name }} ({{ $category->articles->count('articles') }})</a></li>
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
            <h3 class="bg-dark p-2"><a class="text-light" href="/tags">Tags</a></h3>
            <ul class="p-1">
                @foreach ($tags as $tag)
                    <li class="list-inline-item"><a href="/tags/{{ $tag->id }}">{{ $tag->name }} ({{ $tag->articles->count('articles') }})</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
