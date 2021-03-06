@extends('layouts.app')

@section('title')
    Category: {{ $category->name }}
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="mt-2">Category: {{ $category->name }}</h1>
        </div>
    </div>
    <div class="row my-3 pt-2 bg-dark text-white">
        <div class="col-1">
            <h4>ID</h4>
        </div>
        <div class="col-10">
            <h4>Article title</h4>
        </div>
        <div class="col-1">
            <h4></h4>
        </div>
    </div>

    @foreach ($category->articles as $article)
        <div class="row">

            <div class="col-1">
                <p><a href="/admin/articles/{{ $article->id}}/edit">{{ $article->id }}</a></a></p>
            </div>

            <div class="col-10">
                <p><a href="/admin/articles/{{ $article->id}}/edit">{{ $article->title }}</a></p>
            </div>

            <div class="col-1 d-flex justify-content-center">
                <div><a class="btn btn-primary btn-sm mr-1" href="/admin/articles/{{ $article->id }}/edit">Edit</a></div>

                <form action="/admin/articles/{{ $article->id }}" method="POST">
                    @method('DELETE')
                    @csrf

                    <button class="btn btn-secondary btn-sm mr-1" type="submit">Delete</button>
                </form>
            </div>
        </div>
    @endforeach
    <div class="row d-flex justify-content-end mt-4">
                    <div class="p-0 m-0"><a class="btn btn-secondary mr-1" href="/admin/categories">Back to List</a></div>
                </div>
</div>
@endsection
