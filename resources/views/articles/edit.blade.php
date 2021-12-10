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
<body>
@include('modules.navbar')
<h1 class="text-center">Update your new post</h1>
<form class="form-horizontal w-50 m-auto" method="post" enctype="multipart/form-data" action="{{route('article.update', $article['id'])}}">
    @method('PUT')
    @csrf

    <div class="form-group">
        <label for="inputTitle" class="col-xs-2 control-label">Title</label>
        <div class="col-xs-10">
            <input style=" " type="text" name="title" class="form-control" id="inputTitle" value="{{$article['title']}}" placeholder="{{$article['title']}}">
        </div>
    </div>
    <div class="form-group">
        <label for="inputText" class="col-xs-2 control-label">Text:</label>
        <div class="col-xs-10">
            <textarea class="form-control" name="text" id="inputTitle" cols="30" rows="8">{{$article['text']}}</textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="inputCategory" class="col-xs-2 control-label">Category</label>
        <div class="col-xs-10">
            <select type="text" name="category_id" class="form-control" id="inputCategory">
                @foreach($categories as $category)
                    <option value="{{$category->id}}" @if($article['category_id'] == $category->id) selected @endif>{{$category->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="group">
        <label class="custom-file-label" for="customFile">change picture</label>
        <div><span>Your picture</span>
            <img style="width: 150px" class="img-fluid"  src="{{ asset('images/' . $article['img']) }}" alt="">
        </div>
        <div class="row align-content-center">
            <input id="userfile" class="col-9" type="file" name="userfile" multiple>
        </div>
        <div>
            <input data-url="{{route('article.update', $article['id'])}}" class="mt-4 mb-3 btn btn-update" type="submit">
        </div>
    </div>
</form>

<script>
    $(document).ready(function () {
        $('#userfile').click(function() {
            function readImage(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('.img-fluid').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $('#userfile').change(function () {
                readImage(this);
            });
            });
        });

</script>
<script>
    $(document).ready(function () {
        $('.btn-update').click(function() {

            $.ajax({
                url: $(this).data('url'),
                type: "patch",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (){
                    window.location = this.url;
                }

            });
        })
    });

</script>
<script src="/js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
