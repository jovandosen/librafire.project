<!DOCTYPE html>
<html lang="en">
    <head>
        <title>@yield('title', 'Welcome')</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="{!! asset('css/welcome.css') !!}">
        <link rel="stylesheet" type="text/css" href="{!! asset('css/register.css') !!}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </head>
    <body>

        <div id="auth-links-container">
            <ul>
                <li class="home">
                    <a href="{{ route('welcome') }}">
                        <div class="home-image">
                            <i class="fa fa-home"></i>
                        </div>
                    </a>
                </li>
                <li><a href="{{ route('register') }}">REGISTER</a></li>
                <li><a href="{{ route('login') }}">LOGIN</a></li>
            </ul>
        </div>

        <div id="content">
            @yield('content')
        </div>

        <script src="{!! asset('js/welcome.js') !!}"></script>
        <script src="{!! asset('js/register.js') !!}"></script>
    </body>
</html>