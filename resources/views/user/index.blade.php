<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login V1</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="/img/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/css/form/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/css/form/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/css/form/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/css/form/main_form.css">
    <link rel="stylesheet" type="text/css" href="/css/form/util_form.css">
    <!--===============================================================================================-->
</head>
<body>

@if(Route::currentRouteName() == 'auth')
@include('user.auth')
@endif

@if(Route::currentRouteName() == 'registration')
    @include('user.register')
@endif



<!--===============================================================================================-->
<script src="/css/form/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="/css/form/bootstrap/js/popper.js"></script>
<script src="/css/form/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="/css/form/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="/css/form/tilt/tilt.jquery.min.js"></script>
<script >
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>
<!--===============================================================================================-->
<script src="/js/main.js"></script>

</body>
</html>