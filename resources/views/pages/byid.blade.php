@extends('main')

@section('title')
	| {{ $post->title }}
@stop

@section('content')
<div class="row">
	<h1>{{ $post->title }}</h1>
	<h4>${{ $post->price }} - Created On {{ date('F d, Y', strtotime($post->created_at)) }} | Last modified: {{ date('F d, Y', strtotime($post->updated_at)) }}</h4>
	<hr>

	<div class="col-md-8">
		<p>{{ $post->body }}</p>
	</div>

	<div class="col-md-4">
		<div style='border:5px solid navy;width:350px;height:350px;'></div>
	</div>
	
</div>
@stop