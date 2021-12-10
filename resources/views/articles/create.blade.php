<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="icon" href="/img/favicon.ico">
    <title>Blog</title>
    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <!-- Fonts -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/css/mediumish.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="bg-faded">
@include('modules.navbar')
<h1 class="text-center">Create new post</h1>
<form class="form-horizontal w-50 m-auto" method="post" enctype="multipart/form-data" action="{{route('article.store')}}">
    @csrf
    <div class="form-group">
        <label for="inputTitle" class="col-xs-2 control-label">Title</label>
        <div class="col-xs-10">
            <input type="text" name="title" class="form-control" id="inputTitle" placeholder="Title">
        </div>
    </div>
    <div class="form-group">
        <label for="inputText" class="col-xs-2 control-label">Text:</label>
        <div class="col-xs-10">
            <input type="text" class="form-control" name="text" id="inputText" placeholder="Text of article">
        </div>
    </div>
    <div class="form-group">
        <label for="inputCategory" class="col-xs-2 control-label">Category</label>
        <div class="col-xs-10">
            <select type="text" name="category_id" class="form-control" id="inputCategory" placeholder="Title">
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="group">
        <label class="custom-file-label" for="customFile">Choose picture</label>
        <div class="row align-content-center">
            <input class="col-9" type="file" name="userfile">
        </div>
        <div>
            <input class="mt-4 mb-3 btn btn-default" type="submit">
        </div>
    </div>
</form>


<script src="/js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
