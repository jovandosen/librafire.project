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
        <link rel="stylesheet" type="text/css" href="{!! asset('css/item.css') !!}">
        <link rel="stylesheet" type="text/css" href="{!! asset('css/list.css') !!}">
        <link rel="stylesheet" type="text/css" href="{!! asset('css/offer.css') !!}">
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
                        <li><a href="{{ route('item') }}">Item</a></li>
                        <li><a href="{{ route('item.list') }}">Item List</a></li>
                        <li><a href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('welcome') }}">Homepage</a>
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

        @if( session()->has('passwordUpdated') )
            <div id="flash-message-container">
                <p>{{ session()->get('passwordUpdated') }}</p>
            </div>
        @endif

        @if( session()->has('itemCreated') )
            <div id="flash-message-container">
                <p>{{ session()->get('itemCreated') }}</p>
            </div>
        @endif

        @if( session()->has('itemDeleted') )
            <div id="flash-message-container">
                <font color="red">
                    <p>{{ session()->get('itemDeleted') }}</p>
                </font>
            </div>
        @endif

        @if( session()->has('itemUpdated') )
            <div id="flash-message-container">
                <p>{{ session()->get('itemUpdated') }}</p>
            </div>
        @endif
        
        <script src="{!! asset('js/home.js') !!}"></script>
        <script src="{!! asset('js/profile.js') !!}"></script>
        <script src="{!! asset('js/password.js') !!}"></script>
        <script src="{!! asset('js/item.js') !!}"></script>
        <script src="{!! asset('js/offer.js') !!}"></script>
    </body>
</html>