<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>E-Lycée</title>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i|Lato:300,400,400i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('font-awesome/css/font-awesome.min.css') }}">

</head>
<body>
    <header>
        <div class="logo flex">
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
                    <a href="{{url('')}}">Accueil</a>
                    <a href="{{url('actualites')}}">Actualités</a>
                    <a href="{{url('lycee')}}">Lycée</a>
                </nav>
                <div class="log-in-button">
                    <a href="" id="login-open">
                        Connexion
                    </a>
                </div>
            </div>
        </div>
        <!-- <div id="popup-login">
            <div class="popup-content">
                <div class="popup-title">Connexion</div>

                <form class="popup-form" role="form" method="POST" action="{{ url('login') }}">
                    {{csrf_field()}}
                    <p class="">
                        <label for="username">Nom d'utilisateur</label>
                        <input type="text" name="username" placeholder="Pseudo *" class="username" required>
                        @if ($errors->has('username'))
                            <span class="">{{ $errors->first('username') }}</span>
                        @endif
                    </p>
                    <p class="">
                        <label for="password">Password</label>
                        <input name="password" type="password" placeholder="Mot de passe *" class="password" required>
                        @if ($errors->has('password'))
                            <span class="">{{ $errors->first('password') }}</span>
                        @endif
                    </p>
                    <p>
                        <input class="valider" type="submit" value="Valider" id="connecter">
                    </p>
                </form>

                <p class="popup-signin">
                    <a href="#">Si vous n'avez pas vos identifiant, demandez-les auprès de Jean-Paul, 3e étage salle 306.</a>
                </p>
            </div>
        </div> -->
    </header>