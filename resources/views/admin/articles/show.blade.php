@extends('layouts.app')

@section('title', $article->title)

@section('content')
<div class="container">
	<div class="row">
		<div class="col-12">
			@if ($article->image)
			<p><img src="{{ asset('storage/' . $article->image) }}" class="w-100"></p>
			@endif
		</div>
	</div>

	<div class="row">
		<div class="col-12">
			<h1>{{ $article->title }}</h1>
			<h5>{{ $article->subtitle }}</h5>
		</div>
	</div>



	<div class="row">
		<div class="col-12 font-italic">
			<div class="p-3 my-3 bg-dark text-white">
				<p class="p-0 m-0"><a class="text-white" href="/">Home</a> / <a class="text-white" href="/articles">Blog</a> / <a class="text-white" href="/categories/{{ $article->category->id }}">{{ $article->category->name }}</a> / {{ $article->title }}</p>
			</div>
		</div>
	</div>



	<div class="row mt-2">
		<div class="col-12">
			<p>{!! $article->content !!}</p>
		</div>
	</div>

	<div class="row">
		<div class="col-12 d-flex">
			@foreach ($article->tags as $tag)
				<a class="badge badge-light my-3 mr-1" href="/tags/{{ $tag->id }}">{{ $tag->name }}</a>
			@endforeach
		</div>
	</div>

	<div class="row h-100 pt-3">
		<img class="rounded-circle mr-3" style="max-width: 100px" src="{{ asset('storage/' . $article->user->image) }}"><h4 style="line-height: 1.5" class="my-auto float-right align-content-stretch"><em>{{ $article->user->name }},<br>{{ $article->user->about }}</h4></em>
	</div>

	<div class="row d-flex justify-content-end mt-4">
        <div class="p-0 m-0"><a class="btn btn-secondary mr-1" href="/admin/articles">Back to List</a></div>
    </div>

</div>
@endsection
