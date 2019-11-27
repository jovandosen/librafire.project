<!DOCTYPE html>
<html lang="en">
    <head>
        <title>@yield('title', 'Home')</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="{!! asset('css/welcome.css') !!}">
        <link rel="stylesheet" type="text/css" href="{!! asset('css/home.css') !!}">
        <link rel="stylesheet" type="text/css" href="{!! asset('css/profile.css') !!}">
        <link rel="stylesheet" type="text/css" href="{!! asset('css/password.css') !!}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </head>
    <body>

        <div id="auth-links-container">
            <ul>
                <li id="user-details-wrapper">
                    <a href="#">{{ session('user')->firstName }} {{ session('user')->lastName }}</a>
                    <ul id="user-details-links" style="display: none;">
                        <li><a href="{{ route('profile') }}">Profile</a></li>
                        <li><a href="{{ route('password') }}">Password</a></li>
                        <li><a href="#">Item</a></li>
                        <li><a href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>

        <div id="content">
            @yield('content')
        </div>

        @if( session()->has('status') )
            <div id="flash-message-container">
                <p>{{ session()->get('status') }}</p>
            </div>
        @endif

        @if( session()->has('updated') )
            <div id="flash-message-container">
                <p>{{ session()->get('updated') }}</p>
            </div>
        @endif
        
        <script src="{!! asset('js/home.js') !!}"></script>
        <script src="{!! asset('js/profile.js') !!}"></script>
    </body>
</html>