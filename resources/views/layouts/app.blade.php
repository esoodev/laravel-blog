<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Poing Magazine') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontastic.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.default.css') }}" id="theme-stylesheet">

    <!-- Favicon-->
    <link rel="shortcut icon" href="/favicon.png">

</head>
<header class="header">
    <!-- Main Navbar-->
    <nav class="navbar navbar-expand-lg">
        <div class="search-area">
            <div class="search-area-inner d-flex align-items-center justify-content-center">
                <div class="close-btn">
                    <i class="icon-close"></i>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-md-8">
                        <form action="/magazine/search" method="GET" class="search-form">
                            <div class="form-group">
                                <input type="search" name="query" id="search" placeholder="What are you looking for?">
                                <button type="submit" class="submit">
                                    <i class="icon-search-1"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <!-- Navbar Brand -->
            <div class="navbar-header d-flex align-items-center justify-content-between">
                <!-- Navbar Brand -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <!-- Toggle Button-->
                <button type="button" data-toggle="collapse" data-target="#navbarcollapse" aria-controls="navbarcollapse" aria-expanded="false"
                    aria-label="Toggle navigation" class="navbar-toggler">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
            <!-- Navbar Menu -->
            <div id="navbarcollapse" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="/" class="nav-link active ">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="/magazine" class="nav-link">Magazines</a>
                    </li>
                    <li class="nav-item">
                        <a href="/magazine/latest" class="nav-link">Latest</a>
                    </li>
                    <!-- Authentication Links -->
                    @guest
                    <li>
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                            <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
                <div class="navbar-text">
                    <a href="#" class="search-btn">
                        <i class="icon-search-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </nav>
</header>

<body>
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
