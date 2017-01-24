<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    {{-- bootstrap css CDN --}}
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    {{-- bootstrap js CDN --}}
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <title>Hackernews app</title>
</head>
<body>
<div class="container">
    <div "class= col-md-offset-2 col-md-8">
    	<div class="row">
    		<h1>Articles</h1>
    	</div>
    	<div class="row">
    		<form action="{{ route('articles.store') }}" method="POST">
    			{{ csrf_field() }}
    			<div class="col-md-9">
					<input type="text" name="newArticleTitle" class="form-control">
    			</div>
    			<div class="col-md-9">
					<input type="text" name="newArticleLink" class="form-control">
    			</div>
    			<div class="col-md-3">
    				<input type="submit" class="btn btn-primary btn-block" value="New Article">
    			</div>
    		</form>
    	</div>
    </div>
</div>
</body>
</html>