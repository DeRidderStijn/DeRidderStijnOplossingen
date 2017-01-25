<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    {{-- bootstrap css CDN --}}
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    {{-- bootstrap js CDN --}}
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
    <title>Hackernews app</title>
</head>
<body>
 
<div class="container">
    @extends('layouts.app')
    <div "class= col-md-offset-2 col-md-8">
    	<div class="row">
    		<h1>Articles</h1>
    	</div>
        {{-- display succes message --}}
        @if (Session::has('success'))
            <div class="alert alert-succes">
                <strong>Succes:</strong> {{ Session::get('success') }}
            </div>
        @endif
        {{-- display error message --}}
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Error:</strong>
                <ul>
                    @foreach($errors->all() as $error)
                        <li> {{ $error }}</li>
                    @endforeach
                </ul>
            </div>

        @endif
    	

        {{-- display stored articles--}}
        @if (count($storedArticles) > 0)
            <table class="table">
                <thead>
                    <th>Title</th>
                    <th>Link</th>
                    <th>points</th>
                    <th>comments</th>
                    <th>upvote</th>
                    <th>downvote</th>
                    <th>edit</th>
                    <th>delete</th>
                </thead>

                <tbody>
                    @foreach ($storedArticles as $storedArticle)
                        <tr>
                            <th>{{ $storedArticle->title }}</th>
                            <td>{{ $storedArticle->link }}</td>
                            <td>{{ $storedArticle->points }}</td>
                            <td>
                                <a href="{{ route('comments.index', ['articles'=>$storedArticle->id]) }}" class="btn btn-default">comments</a>
                            </td>
                            <td>
                               <a href="{{ route('articles.upvote', ['articles'=>$storedArticle->id]) }}" class="btn btn-default">upvote</a>
                            </td>
                            <td>
                                <a href="{{ route('articles.downvote', ['articles'=>$storedArticle->id]) }}" class="btn btn-default">downvote</a>
                            </td>
                            @if ( (Auth::id()) == $storedArticle->userID) 
                            <td>
                                <a href="{{ route('articles.edit', ['articles'=>$storedArticle->id]) }}" class="btn btn-default">edit</a>
                            </td>
                            <td>
                                <a href="{{ route('articles.deleteArticle', ['articles'=>$storedArticle->id]) }}" class="btn btn-default">delete</a>
                            </td>
                            @endif
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>

        @endif
    </div>
</div>
</body>
</html>