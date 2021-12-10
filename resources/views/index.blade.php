<!DOCTYPE html>
<html lang="en">
<head>
    @include('style')
</head>
<body class="bg-faded" >


<!-- Begin Nav
================================================== -->
@include('modules.navbar')
<!-- End Nav
================================================== -->

<!-- Begin Site Title
================================================== -->
<div class="container bg-faded">
    <div class="mainheading">
        <h1 class="sitetitle">About blog</h1>
        <p class="lead">
            This blog was wrote with PHP and LARAVEL(8)
        </p>
    </div>
    <!-- End Site Title
    ================================================== -->

    <!-- Begin List Posts
    ================================================== -->
    @include('articles.author_stories')
    <!-- End List Posts
    ================================================== -->

    <!-- Begin Footer
    ================================================== -->
    <div class="footer">

        <p class="pull-right">
            Mediumish Theme by <a target="_blank" href="https://www.wowthemes.net">WowThemes.net</a>
        </p>
        <div class="clearfix">
        </div>
    </div>
    <!-- End Footer
    ================================================== -->

</div>
<!-- /.container -->

<!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="/js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
