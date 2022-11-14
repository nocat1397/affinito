<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Milton Milk</title>
    <link rel="shortcut icon" type="image/png" href="{{url('/img/icon/favicon.png')}}" />
    <link rel="apple-touch-icon" href="{{url('/img/icon/favicon.png')}}" />
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .bg-orange {
            background-color: #c02626;
        }
        .btn-success {
            border-radius: 50%;
            background-color: #419eaa!important;
            width: 40px;
            font-size: 15px;
            font-weight: bold;
            border: none; 
        }
        .btn-success:hover {
            color: #fcc71f!important;
            box-shadow: 0px 5px 16px 0px rgba(0,0,0,0.2);
        }
        .card-header {
            background-color: #c02626;
            color: white;
            font-size: 20px;
            font-weight: bold;
        }
        .btn-primary{
            background-color: #c02626;
            color: #fff;
            text-transform: uppercase;
            border-radius: 0!important;
            font-size: .8em!important;
            padding: 12.8px 24px!important;
            padding: 0.8rem 1.5rem!important;
            font-weight: 600!important;
            border: none;
            clip-path: polygon(100% 0%, 100% 74%, 49% 96%, 0 75%, 0 0);
        }
        .btn-primary:hover {
            color: #c02626;
            background-color: #000;
        }
        .bg-greeen {
            background-color: #419eaa!important;

        }
        .card {
            border: none;
            border-radius: 10px;
            
        }
        .card-header {
             clip-path: polygon(100% 0%, 100% 74%, 49% 96%, 0 75%, 0 0);
        }
        .fa-lg {
            color: #419eaa;
        }
        .fa-lg:hover {
            color: #fcc71f;
            transition: .2s ease-in-out;
        }

    </style>
</head>
<body>
    <div id="">
        <nav class="navbar navbar-expand-md navbar-light bg-transparent">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{url('/img/logo/logo.png')}}" height="60" width="150">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
