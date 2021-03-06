<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<title>Todo List App</title>
</head>
<body>
	@include('layouts.app')
	<div class="container">

		<div class="col-md-offset-2 col-md-8">
			<div class="row">
				<h1>Article</h1>
			</div>

			{{-- display success message --}}
			@if (Session::has('success'))
				<div class="alert alert-success">
					<strong>Success:</strong> {{ Session::get('success') }}
				</div>
			@endif
			{{-- dispaly error message --}}
			@if (count($errors) > 0)
				<div class="alert alert-danger">
					<strong>Error:</strong>
					<ul>
						@foreach($errors->all() as $error)
						 <li>{{ $error}}</li>
						@endforeach
					</ul>
				</div>
			@endif
			<a href="{{ route('articles.deleteArticle', ['articles'=>$articleUnderEdit->id]) }}" class="btn btn-danger btn-xs pull-right">
                        <i class="fa fa-btn fa-trash" title="delete"></i> delete article
            </a>
			<div class="row">
				<form action="{{ route('articles.update', [$articleUnderEdit->id]) }}" method="POST">
					{{ csrf_field() }}
					<input type="hidden" name="_method" value="PUT">
					<div class="form-group">
						<input type="text" name = "updatedArticleTitle" class="form-control input-lg" value="{{ $articleUnderEdit->title}}">
					</div>
					<div class="form-group">
						<input type="text" name = "updatedArticleLink" class="form-control input-lg" value="{{ $articleUnderEdit->link}}"
					</div>
					<div class="form-group">
						<input type="submit" value="Save Changes" class="btn btn-success btn-lg">
						<a href="{{ url('/') }}" class="btn btn-danger btn-lg pull-right">Go Back</a>
					</div>
				</form>
			</div>

	</div>
</body>
</html>