<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>E-Lycée</title>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Quicksand" rel="stylesheet">
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
                    <div class="log-in-button">
                        <a href="">
                            Log in
                        </a>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <div class="wrapper">
        <div class="contenu">
            <div class="content">
                @yield('content')
            </div>
            @section('sidebar')
                @include('includes.sidebar');
            @show
        </div>
    <footer>
        {{-- mon footer --}}
    </footer>

    
</body>
</html>