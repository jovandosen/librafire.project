<!DOCTYPE html>
<html lang="en">
    <head>
        <title>@yield('title', 'Welcome')</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="{!! asset('css/welcome.css') !!}">
        <link rel="stylesheet" type="text/css" href="{!! asset('css/register.css') !!}">
        <link rel="stylesheet" type="text/css" href="{!! asset('css/login.css') !!}">
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
            @if( !empty($items) && isset($items) )
                <div id="all-items-container">
                    <table style="width: 80%">
                        <tr>
                            <th>Item Name</th>
                            <th>Description</th>
                            <th>Item Price</th>
                            <th>Payment</th>
                            <th>Delivery</th>
                            <th>Created</th>
                            <th>Option</th>
                        </tr>
                        @foreach( $items as $item )
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->payment }}</td>
                                <td>{{ $item->delivery }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td><a href="@if(!empty(session('user'))) {{ route('item.offer', $item->id) }} @else {{ '#' }} @endif">view</a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            @endif
        </div>

        <script src="{!! asset('js/welcome.js') !!}"></script>
        <script src="{!! asset('js/register.js') !!}"></script>
        <script src="{!! asset('js/login.js') !!}"></script>
    </body>
</html>