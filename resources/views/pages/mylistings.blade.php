@extends('main')

@section('title', '| My Listings')

@section('content')
	<h1>Your Listings:</h1>
	<hr>
	@foreach ($posts as $post)
		<h4>{{ $post->title }} <a class='btn btn-warning btn-sm' href="{{ route('posts.edit', $post->id) }}">Edit</a> <a class='btn btn-danger btn-sm' href="{{ route('posts.delete', $post->id) }}">Delete</a></h4>
		<p>{{ $post->body }}</p>
	@endforeach

	<div class="text-center">
		{!! $posts->links(); !!}
	</div>
@stop