@extends('main')

@section('title', '| Create Listing')

@section('content')
	<h1>Create a new listing</h1>

	<div class="row">
		<div class="col-md-6">
			<form action="{{ route('post.create') }}" method="POST">
			{!! csrf_field() !!}
				<label for="title">Title:</label>
				<input type="text" class="form-control" name="title" placeholder="What item are you selling?">

				<div class="row">
					<div class="col-xs-6">
					<label for="category">Category:</label>
						<select class="form-control" name="category">
							<option value="Automotive">Automotive</option>
							<option value="HuntingAndOutdoors">Hunting and Outdoors</option>
							<option value="Furniture">Furniture</option>
							<option value="ComputersAndElectronics">Computers and Electronics</option>
						</select>
					</div>
					<div class="col-xs-6">
						<label for="price">Asking Price:</label>
						<input type="number" class="form-control" name="price">
					</div>
				</div>				

  				<label for="body">Description:</label>
  				<textarea class="form-control" rows="4" name="body" placeholder="Item description and contact information."></textarea>  				
		</div>

		<div class="col-md-4">
			<h3>Attach a picture</h3>
			<h4 style="color:red;font-size:15px;">Warning: Photo functionality not yet implemented!</h4>

			<label for="picture">Select Image</label>
		    <input type="file" id="picture">

		    <input type="hidden" name="_token" value="{{ csrf_token() }}">
			
		    <p class="help-block">Upload an image of the item you are selling.</p>
		    <br>
			<input type="submit" class="btn btn-primary btn-block">

			

			<a href="/" class="btn btn-danger btn-block">Cancel</a>
			</form>
		</div>
	</div>	

@stop