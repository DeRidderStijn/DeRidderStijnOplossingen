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

    <div class="row">
        <div class="col-md-10 col-md-offset-1">            
            <div class="breadcrumb">
                <a href="{{ url('/') }}">← back to overview</a>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                        Article: Goed bezig manne!!
                </div>

                <div class="panel-content">
                <div class="vote">
                    <form action="http://pascalculator.be/hackernews/public/vote/up" method="POST" class="form-inline upvote">
                        <input type="hidden" name="_token" value="5tn1AvjTnKKSPgsytTTKG3ouwE3cdaJpW8rXNXPn">
                        <button name="article_id"value="16">
                            <i class="fa fa-btn fa-caret-up" title="upvote"></i>
                        </button>
                    </form>
                    <form action="http://pascalculator.be/hackernews/public/vote/down" method="POST" class="form-inline downvote">
                    <input type="hidden" name="_token" value="5tn1AvjTnKKSPgsytTTKG3ouwE3cdaJpW8rXNXPn">
                        <button name="article_id"value="16">
                            <i class="fa fa-btn fa-caret-down" title="downvote"></i>
                        </button>
                    </form>
                </div>
                <div class="url">
                    <a href="https://github.com/pascalculator/kdg-web-backend-2016-2017" class="urlTitle">Goed bezig manne!!</a>
                </div> 
                <div class="info">
                    2 points  | posted by jajaja | 0 comments
                </div>
                <div class="comments">
                    <div>   
                    <p>No comments yet</p>
                    </div>


        <form action="{{ route('comments.store') }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="body" class="col-sm-3 control-label">Comment</label>
                        <div class="col-sm-6">
                            <textarea type="text" name="newCommentText" id="newCommentText" class="form-control"></textarea>
                            <input type="hidden" name="artikelID" value="{{ $artikelid }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-plus"></i> Add comment
                            </button>
                        </div>
                    </div>
                </form>

        {{-- display stored comments for article id--}}
        @if (count($storedComments) > 0)
        <ul>
            @foreach ($storedComments as $storedComment)
                      

            <li>
                <div class="comment-body">
                    {{ $storedComment->text }}
                </div>
                <div class="comment-info">
                    Posted by someuser on {{ $storedComment->created_at }}
                    @if ((Auth::id()) == $storedComment->userID)
                <a href="{{ route('comments.edit', ['comments'=>$storedComment->id]) }}" class ="btn btn-primary btn-xs edit-btn">edit</a>
                <a href="{{ route('comments.deleteComment', ['articles'=>$storedComment->id]) }}" class ="btn btn-danger btn-xs edit-btn">
                        <i class="fa fa-btn fa-trash" title="delete"></i> delete 
                </a>
                    @endif
                </div>
            </li>
                
            @endforeach  
        </ul>
        @endif
    </div>
</div>
</body>
</html>