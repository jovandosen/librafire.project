<!DOCTYPE html>
<html lang="en">
    <head>
        <title>@yield('title', 'Home')</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="{!! asset('css/welcome.css') !!}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </head>
    <body>

        <div id="auth-links-container">
            <ul>
                <li><a href="#">LINK ONE</a></li>
                <li><a href="#">LINK TWO</a></li>
            </ul>
        </div>

        <div id="content">
            @yield('content')
        </div>

    </body>
</html>