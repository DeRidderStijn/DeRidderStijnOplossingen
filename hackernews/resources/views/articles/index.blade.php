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
  @include('layouts.app')
<div class="container">
   
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
         <div class="row">
        <div class="col-md-10 col-md-offset-1">

            
            <div class="panel panel-default">
                <div class="panel-heading">Article overview</div>

                <div class="panel-content">

        @if (count($storedArticles) > 0)
            <ul class="article-overview">
            @foreach ($storedArticles as $storedArticle)
                <li>
                    <div class="vote">
                        <div class="form-inline upvote">
                            <a href="{{ route('articles.upvote', ['articles'=>$storedArticle->id]) }}">
                                <button>
                                <i class="fa fa-btn fa-caret-up" title="upvote"></i>
                                </button>
                            </a>
                        </div>
                                                    
                        <div class="form-inline downvote">
                             <a href="{{ route('articles.downvote', ['articles'=>$storedArticle->id]) }}">
                                <button>
                                <i class="fa fa-btn fa-caret-down" title="downvote"></i>
                            </button>
                            </a>
                        </div>
                    </div>
                    <div class="url">
                        <a href="{{ $storedArticle->link }}" class="urlTitle">{{ $storedArticle->title }}</a>
                        @if ( Auth::id() == $storedArticle->userID)
                         <a href="{{ route('articles.edit', ['articles'=>$storedArticle->id]) }}" class="btn btn-primary btn-xs edit-btn">edit</a>
                        @endif
                    </div> 
                    <div class="info">
                        {{ $storedArticle->points }} points  | posted by {{ Auth::id() }} | <a href="{{ route('comments.index', ['articles'=>$storedArticle->id]) }}">amount of comments</a>
                    </div>
                </li>        


            @endforeach
            </ul>
        @endif


                </div>

            </div>
        </div>
</div>
