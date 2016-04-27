@extends('main')

@section('title')
	| 
@stop

@section('content')
<div class="row">
	<h1></h1>
	<hr>
	<div class="row">

	@foreach ($posts as $post)
		<div class="col-md-4">
			<h4>{{ $post->title }}</h4>
			<p>{{ substr($post->body, 0, 300) }}{{ strlen($post->body) > 300 ? "..." : "" }}</p>
			<a class="btn btn-success" href="../listing/{{ $post->id }}">Expand</a>
		</div>
	@endforeach

	</div>

	<div class="text-center">
		{!! $posts->links(); !!}
	</div>
	
</div>
@stop