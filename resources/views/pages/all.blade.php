@extends('main')

@section('title', '| All Listings')

@section('content')
	<h1>All Postings</h1>
	<hr>
	<div class="row">

	@foreach ($posts as $post)
	<div class="col-md-4">
		<h4>{{ $post->title }}</h4>
		<p>{{ date('M j, Y', strtotime($post->created_at)) }}</p>
		<p>{{ substr($post->body, 0, 300) }}{{ strlen($post->body) > 300 ? "..." : "" }}</p>
		<a class="btn btn-success" href="listing/{{ $post->id }}">Expand</a>
	</div>
	@endforeach

	</div>

	<div class="text-center">
		{!! $posts->links(); !!}
	</div>
@stop

