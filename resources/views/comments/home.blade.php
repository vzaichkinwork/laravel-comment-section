<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Comments</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    <!--bootstrap cdn -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">

    <div id="post_header">
        <h1>What comes first: design or content?</h1>
    </div>

    <div id="post_article">
        <p><em><span style="font-weight: 400;">
                                Having a powerful website with a consistent user experience is important - bot for users and for SEO purposes.
                                However that being said, that without the right content in place, all that well-planned and laid-out design work will go to waste.
                                Content and design are all closely related, but usually that doesn’t mean they can be tackled in whichever order seems the most convenient.
                                There are two commonly used approaches: the famous content-first approach and opposite when writer and designer collaborate from the very beginning of the project.
                                <a href="https://solar-digital.com/blog/what-comes-first-design-or-content">Read more...</a>
                            </span></em></p>
    </div>

    @foreach ($comments as $comment)
        <div class="row">
            <div class="col-sm-1">
                <div class="thumbnail">
                    <img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png"
                         style="width: 44px; height: 44px" alt="user">
                </div>
            </div>

            <div class="col-sm-5">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong>{{ $comment->user }}</strong> <span class="text-muted">{{ $comment->updated_at }}</span>
                    </div>
                    <div class="panel-body">
                        {{ $comment->message }}
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form id="comments_section" method="post" action="{{ route('comment.store') }}">
        {{ csrf_field() }}
        <input type="hidden" name="user" value="Anonymous">
        <input type="hidden" name="date" value="{{ date('Y-m-d H:i:s') }}">
        <div class="form-group">
            <textarea class="form-control" name="message" rows="3"></textarea>
        </div>
        <button type="submit" name="commentSubmit" class="btn btn-primary">Comment</button>
    </form>

</div>
</body>
</html>
