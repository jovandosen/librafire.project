<!DOCTYPE html>
<html lang="en">
    <head>
        <title>@yield('title', 'Home')</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="{!! asset('css/welcome.css') !!}">
        <link rel="stylesheet" type="text/css" href="{!! asset('css/home.css') !!}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </head>
    <body>

        <div id="auth-links-container">
            <ul>
                <li id="user-details-wrapper">
                    <a href="#">{{ session('user')->firstName }} {{ session('user')->lastName }}</a>
                    <ul id="user-details-links" style="display: none;">
                        <li><a href="#">Profile</a></li>
                        <li><a href="#">Item</a></li>
                        <li><a href="#">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>

        <div id="content">
            @yield('content')
        </div>

        <script src="{!! asset('js/home.js') !!}"></script>
    </body>
</html>