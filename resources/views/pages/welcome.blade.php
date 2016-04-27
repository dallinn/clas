@extends('main')

@section('title', '| Homepage')

@section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                  <h1>Welcome to Clas!</h1>
                  <p class="lead">Clas is an online classifieds board for buying and selling stuff.</p>
                  <p>
                  <a class="btn btn-primary btn-lg" href="{{ url('all') }}" role="button">View Listings</a>
                  <a class="btn btn-primary btn-lg" href="{{ url('create') }}" role="button">Sell your stuff</a>
                  </p>
                </div>
            </div>
        </div> <!-- end of header .row -->

        <div class="row">
            <div class="col-md-3">
                <h2>Categories</h2>
                <a href="{{ url('/all/Automotive') }}">Automotive</a><br>
                <a href="{{ url('/all/HuntingAndOutdoors') }}">Hunting and Outdoors</a><br>
                <a href="{{ url('/all/Furniture') }}">Furniture</a><br>
                <a href="{{ url('/all/ComputersAndElectronics') }}">Computers and Electronics</a>
            </div>

            <div class="col-md-8">    
                <h2>Recent listings</h2>
                <div class="row">

                  @foreach ($posts as $post)
                    <div class="col-md-4">
                      <h4>{{ $post->title }}</h4>
                      <p>{{ substr($post->body, 0, 100) }}{{ strlen($post->body) > 100 ? "..." : "" }}</p>
                      <a class="btn btn-success" href="listing/{{ $post->id }}">Expand</a>
                    </div>
                  @endforeach   

                </div>   
            </div>            
        </div>
@stop