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
        <div class="row">
            <form action="{{ route('comments.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="col-md-9">
                    <input type="text" name="newCommentText" class="form-control">
                    <input type="hidden" name="artikelID" value="{{ $artikelid}}"
                </div>
                <div class="col-md-3">
                    <input type="submit" class="btn btn-primary btn-block" value="New comment">
                </div>
            </form>
        </div>

        {{-- display stored comments for article id--}}
        @if (count($storedComments) > 0)
            <table class="table">
                <thead>
                    <th>Comment</th>
                    <th>Date</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    
                </thead>

                <tbody>
                    @foreach ($storedComments as $storedComment)
                        <tr>
                            <th>{{ $storedComment->text }}</th>
                            <td>{{ $storedComment->created_at }}</td>
                            <td>
                                <a href="{{ route('comments.edit', ['comments'=>$storedComment->id]) }}" class="btn btn-default">edit</a>
                            </td>
                            <td>
                                <a href="{{ route('comments.deleteComment', ['articles'=>$storedComment->id]) }}" class="btn btn-default">delete</a>
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>

        @endif
    </div>
</div>
</body>
</html>