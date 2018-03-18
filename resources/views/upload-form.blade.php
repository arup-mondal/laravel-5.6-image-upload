<!DOCTYPE html>
<html>
	<head>
		<title>Image Upload with Laravel</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	</head>
	<body>
		<div class="container">
			@if($errors->has('image'))
				<div class="alert alert-danger" role="alert">
				  <h4 class="alert-heading">Uh oh!</h4>
				  @foreach($errors->get('image') as $message)
				  	<p>{{ $message }}</p>
				  @endforeach
				</div>
			@endif	
			@if(Session::has('status'))
				<div class="alert alert-{{ Session::get('status') }}" role="alert">
				  	<p>{{ Session::get('message') }}</p>
				</div>	
			@endif
			<h1>Upload Images With Laravel 5.6</h1>
			<form action="{{ route('upload') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
			    <div class="form-group">
					<input type="file" name="image">
				</div>
			    <div class="form-group">
					<input type="submit" value="Save Image" class="btn btn-info">
				</div>	
			</form>
		</div>
	</body>
</html>