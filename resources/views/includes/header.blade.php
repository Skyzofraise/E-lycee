<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>E-Lycée</title>
    
    <meta property="og:url"           content="http://www.e-lycee.com/" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="E-Lycee" />
    <meta property="og:description"   content="Site d'actualité sur les mathématiques" />
    <meta property="og:image"         content="http://www.your-domain.com/path/image.jpg" />

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i|Lato:300,400,400i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('font-awesome/css/font-awesome.min.css') }}">

</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

    <header>
        <div class="logo flex">
            <h1><a href="{{url('')}}">E-Lycée</a></h1>
            <div class="responsive-nav">
                <nav>
                    <input type="checkbox" id="nav" /><label for="nav"></label>
                    <div class="content-responsive-nav">
                        
                        @if (Auth::check() == true)
                            
                            <a href="{{ url('/dashboard') }}"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a>
                            <a href="{{url('/logout')}}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                <i class="fa fa-power-off" aria-hidden="true"></i> Déconnexion
                            </a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        @else
                            <a href="{{url('login')}}">
                                <i class="fa fa-power-off" aria-hidden="true"></i> 
                                Connexion
                            </a>

                            <a href="{{ url('/register') }}"><i class="fa fa-user-circle-o" aria-hidden="true"></i> S'enregistrer</a>
                        @endif

                        <a href="{{url('')}}">Accueil</a>
                        <a href="{{url('actualites')}}">Actualités</a>
                        <a href="{{url('lycee')}}">Lycée</a>
                    
                        

                        <ul class="social-searchbar">
                            <li>
                                <div class="fb-like" data-href="https://www.facebook.com/pages/Coluche-president/207260162718463" data-layout="button" data-action="like" data-size="small" data-show-faces="true"></div>
                            </li>
                            <li>
                                <a href="#" alt="Facebook">
                                    <img src="../images/fb.svg" alt="" title="facebook icon">
                                </a>
                            </li>
                            <li>
                                <a href="#" alt="Twitter">
                                    <img src="../images/twitter.svg" alt="" title="twitter icon">
                                </a>
                            </li>
                            <li class="search">

                                {!! Form::open(array('url' => 'actualites', 'method' => 'GET', 'class' => 'navbar-form navbar-left')) !!}

                                    {!! Form::text('term', Request::get('term'),
                                        array('required',
                                            'class'=>'form-control',
                                            'id'=>'searchbar',
                                            'placeholder'=>'Rechercher...')) !!}

                                      <button type="submit" class="btn btn-default-sm">
                                        <i class="fa fa-search"></i>
                                      </button>

                                {!! Form::close() !!}
                            </li>
                        </ul>
                    </div>
                </nav>

            </div>
        </div>
        <div class="nav-container">
            <div class="top-nav">
                <ul>
                    <li>
                        <div class="fb-like" data-href="https://www.facebook.com/pages/Coluche-president/207260162718463" data-layout="button" data-action="like" data-size="small" data-show-faces="true"></div>
                    </li>
                    <li>
                        <a href="#" alt="Facebook">
                            <img src="../images/fb.svg" alt="" title="facebook icon">
                        </a>
                    </li>
                    <li>
                        <a href="#" alt="Twitter">
                            <img src="../images/twitter.svg" alt="" title="twitter icon">
                        </a>
                    </li>
                    <li class="search">

                        {!! Form::open(array('url' => 'actualites', 'method' => 'GET', 'class' => 'navbar-form navbar-left')) !!}

                            {!! Form::text('term', Request::get('term'),
                                array('required',
                                    'class'=>'form-control',
                                    'id'=>'searchbar',
                                    'placeholder'=>'Rechercher...')) !!}

                              <button type="submit" class="btn btn-default-sm">
                                <i class="fa fa-search"></i>
                              </button>

                        {!! Form::close() !!}
                    </li>
                </ul>
            </div>
            <div class="second-nav">
                <nav>
                    <a href="{{url('')}}">Accueil</a>
                    <a href="{{url('actualites')}}">Actualités</a>
                    <a href="{{url('lycee')}}">Lycée</a>
                </nav>
                

                @if (Auth::check() == true)
                    <div class="log-in-button">
                        <a href="{{ url('/dashboard') }}">Dashboard</a>
                    </div>
                    <div class="log-in-button">
                        <a href="{{url('/logout')}}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            Déconnexion
                        </a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                @else
                    <div class="log-in-button">
                        <a href="{{url('login')}}">
                            Connexion
                        </a>
                    </div>

                    <div class="log-in-button">
                        <a href="{{ url('/register') }}">S'enregistrer</a>
                    </div>
                @endif

            </div>
        </div>
    </header>