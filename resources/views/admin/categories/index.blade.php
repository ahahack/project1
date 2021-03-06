@extends('layouts.app')

@section('title')
    Blog: Categories
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="mt-2">Blog: Categories</h1>
            <a href="{{ '/admin/categories/create' }}">Create New category</a>
        </div>
    </div>
    <div class="row my-3 pt-2 bg-dark text-white">
        <div class="col-1"><h3>ID</h3></div>
        <div class="col-8"><h3>Category name</h3></div>
        <div class="col-2"><h3>Articles list</h3></div>
        <div class="col-1"><h3></h3></div>
    </div>
    @foreach ($categories as $category)
        <div class="row mt-2">
            <div class="col-1"><a href="/admin/categories/{{ $category->id }}/edit">{{ $category->id }}</a></div>

            <div class="col-8"><a href="/admin/categories/{{ $category->id }}/edit">{{ $category->name }}</a></div>

            <div class="col-2"><a href="/admin/categories/{{ $category->id }}">View all articles ({{ $category->articles->count('articles') }})</a></div>

            <div class="col-1 d-flex justify-content-center">
                <div><a class="btn btn-primary btn-sm mr-1" href="/admin/categories/{{ $category->id }}/edit">Edit</a></div>

                <form action="/admin/categories/{{ $category->id }}" method="POST">
                    @method('DELETE')
                    @csrf

                    <button class="btn btn-secondary btn-sm mr-1" type="submit">Delete</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection
