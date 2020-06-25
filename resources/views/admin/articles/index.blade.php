@extends('layouts.app')

@section('title')
    Blog: Articles
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="mt-2">Blog: Articles</h1>
            <a href="{{ '/admin/articles/create' }}">Create New Article</a>
        </div>
    </div>
    <div class="row my-3 pt-2 bg-dark text-white">
        <div class="col-1"><h3>ID</h3></div>
        <div class="col-7"><h3>Article name</h3></div>
        <div class="col-2"><h3>Active</h3></div>
        <div class="col-2"><h3></h3></div>
    </div>
    @foreach ($articles as $article)
        <div class="row mt-2">
            <div class="col-1"><a href="/admin/articles/{{ $article->id }}/edit">{{ $article->id }}</a></div>

            <div class="col-7"><a href="/admin/articles/{{ $article->id }}/edit">{{ $article->title }}</a></div>

            <div class="col-2"><a href="/admin/articles/{{ $article->id }}/edit">{{ $article->active }}</a></div>

            <div class="col-2 d-flex justify-content-center">
                <div><a class="btn btn-primary btn-sm mr-1" href="/admin/articles/{{ $article->id }}/edit">Edit</a></div>

                <form action="/admin/articles/{{ $article->id }}" method="POST">
                    @method('DELETE')
                    @csrf

                    <button class="btn btn-secondary btn-sm mr-1" type="submit">Delete</button>
                </form>

                <div><a class="btn btn-dark btn-sm mr-1" href="/admin/articles/{{ $article->id }}">Preview</a></div>
            </div>
        </div>
    @endforeach
    <div class="d-flex justify-content-center pt-5">
                {{ $articles->links() }}
            </div>
</div>
@endsection
