<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>E-Lycée</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i|Lato:300,400,400i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('font-awesome/css/font-awesome.min.css') }}">

    <link href="/css/app.css" rel="stylesheet"> <!-- Le css bootstrap -->
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body> 
<div class="main-content" id="dashboard">
    <header>
        <nav class="navbar navbar-default">
            <div class="navbar-header navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="{{url('/dashboard')}}" class="navbar-brand">E-Lycée Dashboard</a></li>
                </ul>
            </div>
            <div id="navbar" class="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href=""><i class="fa fa-user-circle-o" aria-hidden="true"></i>

                        @if( Auth::user()->role == "teacher")
                            Professeur {{ Auth::user()->username }}
                        @else
                            Étudiant {{ Auth::user()->username }}
                        @endif
    
                        </a>
                    </li>
                    <li>
                        <a href="{{url('')}}"><i class="fa fa-home" aria-hidden="true">
                        </i> Retourner au site public</a>
                    </li>
                    <li>
                        <a href="{{url('')}}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="fa fa-power-off" aria-hidden="true"></i> Déconnexion</a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </div><!--/.nav-collapse -->
        </nav>
    </header>

    <div class="container-fluid">
        <section class="row">
            <nav class="col-md-2 second-sidebar">
                <ul class="nav">
                    <li><a href="{{url('dashboard')}}">Dashboard</a></li>
                    <li><a href="{{url('questions')}}">QCMs</a></li>
                    <li><a href="{{url('users')}}">Elèves</a></li>
                    <li><a href="{{url('posts')}}">Articles</a></li>
                </ul>
            </nav>
            <!-- @yield('sidebar') -->

            <article class="col-md-10" >
                    @yield('content')
            </article>
        </section>
    </div>

</div>

    <!-- Scripts -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('js/javascript.js') }}"></script>

    <script src="/js/app.js"></script> <!-- Le script bootstrap -->
</body>
</html>