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
        <nav class="navbar navbar-toggleable-md navbar-light bg-faded navbar-fixed-top">
            <button class="magic-btn navbar-toggler navbar-toggler-right pull-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a href="{{url('/dashboard')}}" class="navbar-brand">E-Lycée</a>

            <div class="collapse navbar-collapse navbar-elements" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto navbar-right">
                  <li class="nav-item">
                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>

                    @if( Auth::user()->role == "teacher")
                        Professeur {{ Auth::user()->username }}
                    @else
                        Étudiant {{ Auth::user()->username }}
                    @endif

                  </li>

                  <li class="nav-item">
                    <a href="{{url('')}}"><i class="fa fa-home" aria-hidden="true"></i> Retourner au site public</a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('')}}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><i class="fa fa-power-off" aria-hidden="true"></i> Déconnexion</a>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                  </li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="container-fluid">
        <section class="row">
            <nav class="col-sm-2 col-xs-12 second-sidebar">
                <ul class="nav">
                    <li><a href="{{url('dashboard')}}">Dashboard</a></li>
                    <li><a href="{{url('qcm')}}">QCMs
						@if(isset($number_questions) && $number_questions !== 0)
	                    	<span class="badge">{{ $number_questions }}</span>
	                    @endif
                    </a></li>
                </ul>
            </nav>
            <!-- @yield('sidebar') -->

            <article class="col-sm-10 col-xs-12 col-sm-offset-2" >
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