<!doctype html>
<html class="no-js" lang="{{ app()->getLocale() }}" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{ url('/') }}/css/foundation.css">
    <link rel="stylesheet" href="{{ url('/') }}/css/app.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
             integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<body>
<div class="grid-container">
    <div class="top-bar">
        <div class="top-bar-left">
            <ul class="dropdown menu" data-dropdown-menu>
                <li><a href="{{ url('/') }}"><strong>{{ config('app.name', 'Laravel') }}</strong></a></li>
                @if( Auth::check())
                    <li><a href="{{ url('/') }}/chusqers/create">Añadir Mensaje</a></li>
                @endif
            </ul>
        </div>
        <div class="top-bar-right">

            <ul class="dropdown menu" data-dropdown-menu>
                <li>
                    <div class="top-bar-right">
                        <ul class="menu">
                            <form action="/chusqers">
                                <li>
                                    <input type="search" placeholder="Buscar ..." id="keywords" name="keywords">
                                </li>
                            </form>
                        </ul>
                    </div>
                </li>
                @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li>
                            <a href="{{ url('/') }}/{{ Auth::user()->slug }}">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <ul class="menu vertical">
                                <li><a href="/profile">Profile</a></li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
            </ul>
        </div>
    </div>
</div>

<div class="grid-container">
    @yield('content')
</div>

<script src="{{ url('/') }}/js/vendor/jquery.js"></script>
<script src="{{ url('/') }}/js/vendor/what-input.js"></script>
<script src="{{ url('/') }}/js/vendor/foundation.js"></script>
<script src="{{ url('/') }}/js/app.js"></script>
</body>
</html>
