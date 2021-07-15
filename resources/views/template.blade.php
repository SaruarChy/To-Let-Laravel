<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <title>To-Let | Home rental</title>
</head>

<body>
    {{View::make('header')}}
    @yield("home")
    @yield("author")
    @yield("register")
    @yield("login")
    @yield("detail")
    {{View::make('footer')}}
</body>

</html>