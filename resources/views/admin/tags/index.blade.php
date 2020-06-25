@extends('layouts.app')

@section('title')
    Blog: Tags
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="mt-2">Blog: Tags</h1>
            <a href="{{ '/admin/tags/create' }}">Create New Tag</a>
        </div>
    </div>
    <div class="row my-3 pt-2 bg-dark text-white">
        <div class="col-1"><h3>ID</h3></div>
        <div class="col-8"><h3>Tag name</h3></div>
        <div class="col-2"><h3>Articles list</h3></div>
        <div class="col-1"><h3></h3></div>
    </div>
    @foreach ($tags as $tag)
        <div class="row mt-2">
            <div class="col-1"><a href="/admin/tags/{{ $tag->id }}/edit">{{ $tag->id }}</a></div>

            <div class="col-8"><a href="/admin/tags/{{ $tag->id }}/edit">{{ $tag->name }}</a></div>

            <div class="col-2"><a href="/admin/tags/{{ $tag->id }}">View all articles ({{ $tag->articles->count('article') }})</a></div>

            <div class="col-1 d-flex justify-content-center">
                <div><a class="btn btn-primary btn-sm mr-1" href="/admin/tags/{{ $tag->id }}/edit">Edit</a></div>

                <form action="/admin/tags/{{ $tag->id }}" method="POST">
                    @method('DELETE')
                    @csrf

                    <button class="btn btn-secondary btn-sm mr-1" type="submit">Delete</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection
