<!DOCTYPE html>
<html lang="en">
<head>
   @include('style')
</head>
<body class="bg-faded">

<!-- Begin Nav
================================================== -->
@include('modules.navbar')
<!-- End Nav
================================================== -->

<!-- Begin Article
================================================== -->
<div class="container">
    <div class="row text-center">


        <!-- Begin Post -->
        <div class="col">
            <div class="mainheading">

                <!-- Begin Top Meta -->
                <div class="row post-top-meta">
                    <div class="col">
                        <a href="{{route('allByAuthor', $article->user->name)}}">{{$article->user->name}}</a>
                    </div>
                </div>
                <!-- End Top Menta -->

                <h1 class="posttitle card-title">{{$article->title}}</h1>
                <p>Views - ({{$article->views}})</p>

            </div>

            <!-- Begin Featured Image -->
            <img class="featured-image img-fluid" src="{{ asset('images/' . $article->img) }}" alt="">
            <!-- End Featured Image -->

            <!-- Begin Post Content -->
            <div class="article-post">{{$article->text}}</div>
            <!-- End Post Content -->

            <!-- Begin Category -->
            <div class="after-post-tags">
                <ul class="tags">
                    <li><a href="{{route('category_show', $article->category->name)}}">{{$article->category->name}}</a></li>
                </ul>
            </div>
            <!-- End category -->
            @if($article->author_id == Auth::id())
            <div class="row justify-content-around">
                <div class="form-item text-center">
                    <button type="submit" data-url="{{route('article.edit', $article->id)}}" class="update_button btn">Edit</button>
                </div>
                <div class="form-item text-center">
                    <button type="submit" data-url="{{route('article.destroy', $article->id)}}" class="destroy_button btn bg-danger">Delete</button>
                </div>
            </div>
            @endif
        </div>
        <!-- End Post -->

    </div>
</div>
<!-- End Article
================================================== -->


<!-- Begin AlertBar
================================================== -->
<div class="alertbar">
    <div class="container text-center">
        <img src="assets/img/logo.png" alt=""> &nbsp; Never miss a <b>story</b> from us, get weekly updates in your inbox. <a href="#" class="btn subscribe">Get Updates</a>
    </div>
</div>
<!-- End AlertBar
================================================== -->

<!-- Begin Footer
================================================== -->
<div class="container">
    <div class="footer">
        <p class="pull-left">
            Copyright  Your Website Name
        </p>
        <p class="pull-right">
            Mediumish Theme by <a target="_blank" href="https://www.wowthemes.net">WowThemes.net</a>
        </p>
        <div class="clearfix">
        </div>
    </div>
</div>
<!-- End Footer
================================================== -->
<script>
    $(document).ready(function () {
        $('.destroy_button').click(function() {

            $.ajax({
                url: $(this).data('url'),
                type: "delete",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (){
                    window.location = '/article';
                },
            });
        })
    });
</script>
<script>
    $(document).ready(function () {
        $('.update_button').click(function() {

            $.ajax({
                url: $(this).data('url'),
                type: "get",
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

<!-- Placed at the end of the document so the pages load faster -->
<script src="assets/js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/ie10-viewport-bug-workaround.js"></script>
<script src="assets/js/mediumish.js"></script>
</body>
</html>
