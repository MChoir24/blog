<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Blogs') }} | @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/blog.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- ICON NEEDS FONT AWESOME FOR CHEVRON UP ICON -->
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/blog.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
{{-- {{ dd($blogs) }} --}}

<body class="bg-default">
    {{-- <a href="javascript:" id="return-to-top"><i class="icon-chevron-up"></i></a> --}}
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light shadow bg-light fixed-top" id="mynav">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', '') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link @yield('active')" href="/">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('active1')" href="/berita">Berita</a>
                        </li>
                        <li class="nav-item dropdown">
                            <div class="dropdown-toggle nav-link @yield('active2')" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Profil
                            </div>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="/profile/struktur">Struktur</a>
                                <a class="dropdown-item" href="/profile/geografis">letak geografis</a>
                                <a class="dropdown-item" href="/profile/iklim">Iklim</a>
                                <a class="dropdown-item" href="/profile/penduduk">Penduduk</a>
                                <a class="dropdown-item" href="/profile/desa">Desa/Kelurahan</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('active3')" href="/tentang">Tentang</a>
                        </li>
                    </ul>
                    <form class="ml-auto" action="/search" method="post">
                        <input class="nav-link rounded-2 form-control" type="text" name="word" value="" placeholder="Cari">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
    </div>
    </nav>



    <main class="core py-4" style="margin-top: 55px;">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="page-footer footer font-small blue bg-light">
        <div class="links ">
            <a href="https://laravel.com/docs">Docs</a>
            <a href="https://laracasts.com">Laracasts</a>
            <a href="https://laravel-news.com">News</a>
            <a href="https://blog.laravel.com">Blog</a>
            <a href="https://nova.laravel.com">Nova</a>
            <a href="https://forge.laravel.com">Forge</a>
            <a href="https://github.com/laravel/laravel">GitHub</a>
        </div>
        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2018 Copyright
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->
    
    {{-- back to top --}}
    <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Click to return on the top page" data-toggle="tooltip" data-placement="left"><i class="icon-chevron-up"></i></a>
</body>

</html>
