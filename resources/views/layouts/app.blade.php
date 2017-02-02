<!DOCTYPE html>
<html lang="en">
<head>
    <title>Quiz - Made with Laravel</title>

    <!-- CSS And JavaScript -->
    {{--CSS--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">--}}
    <link rel="stylesheet" href="/css/app.css">
    {{--JS--}}
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
</head>

<body>
<div class="container">
    <nav class="navbar navbar-default">
        <!-- Navbar Contents -->
    </nav>
</div>

<div class="container">
    @yield('content')
</div>



</body>
</html>