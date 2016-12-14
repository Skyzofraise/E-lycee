<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>E-Lycée</title>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i|Quicksand:400,500,700" rel="stylesheet">
</head>
<body>
    <header>
        <div class="logo">
            <h1><a href="{{url('')}}">E-Lycée</a></h1>
        </div>
        <div class="nav-container">
            <div class="top-nav">
                <ul>
                    <li class="search">Search!</li>
                    <li>Like fb</li>
                    <li>
                        <a href="#" alt="Facebook">
                            <img src="images/fb.svg" alt="" title="facebook icon">
                        </a>
                    </li>
                    <li>
                        <a href="#" alt="Twitter">
                            <img src="images/twitter.svg" alt="" title="twitter icon">
                        </a>
                    </li>
                </ul>
            </div>
            <div class="second-nav">
                <nav>
                    <a href="{{url('')}}">Home</a>
                    <a href="{{url('actualites')}}">Actualités</a>
                    <a href="">Lycée</a>
                </nav>
                <div class="log-in-button">
                    <a href="">
                        Log in
                    </a>
                </div>
            </div>
        </div>
    </header>
    <div class="banner flex">
        <h2>
            Les Mathématiques c'est fantastique!
        </h2>
    </div>
    <div class="wrapper">
        <div class="contenu">
            <div class="content">
                @yield('content')
            </div>
            @section('sidebar')
                @include('includes.sidebar')
            @show
        </div>
    </div>
    <footer class="flex">
        <span class="static-link legal"><a href="">Mentions légales</a></span>
        <span class="static-link contact"><a href="">Contact</a></span>
    </footer>

    
</body>
</html>