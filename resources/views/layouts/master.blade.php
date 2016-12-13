<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>E-Lycée</title>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat+Alternates|Quicksand" rel="stylesheet">
</head>
<body>

    <header>
        <div class="logo">
            <h1><a href="{{url('')}}">E-Lycée</a></h1>
        </div>
        <div class="top-nav">
            <ul>
                <li>Like fb</li>
                <li>Facebook</li>
                <li>Twitter</li>
                <li class="search">Search!</li>
            </ul>
        </div>
        <div class="second-nav">
            <nav>
                <a href="{{url('')}}">Home</a>
                <a href="{{url('actualites')}}">Actualités</a>
                <a href="">Lycée</a>
            </nav>
        </div>
    </header>
    <div class="wrapper">
        <div class="contenu">
            <div class="content">
                @yield('content')
            </div>
            <div class="sidebar">
                @section('sidebar')
                    <nav>
                    </nav>
                @show
            </div>
        </div>
<header>
    <div class="header">
        <h1><a href="{{url('')}}">E-Lycée</a></h1>
    </div>
    <div class="top-nav">
        <ul>
            <li>Like fb</li>
            <li>Facebook</li>
            <li>Twitter</li>
            <li class="search">Search!</li>
        </ul>
    </div>
    <div class="second-nav">
        <nav>
            <a href="">Home</a>
            <a href="">Actualités</a>
            <a href="">Lycée</a>
        </nav>
    </div>
</header>
<div class="contenu">
    <div class="content">
        @yield('content')
    </div>
    <div class="sidebar">
        @section('sidebar')
            <div>
                YEAH !!! BAMBOO SIDEBAR
            </div>
        @show
    </div>
    <footer>
        {{-- mon footer --}}
    </footer>

    
</body>
</html>