<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>E-Lycée</title>
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

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{url('')}}">E-Lycée</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="{{url('')}}">Retour au site public</a></li>
                    <li class="active"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                    <li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        Gestion
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a href="">Des élèves</a></li>
                      <li><a href="">Des articles</a></li>
                    </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="">Nom du prof</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
    </nav>


    <div class="row">
        <div class="col-md-3">
            <ol class="breadcrumb">
                <!-- <li><a href="#">Dashboard</a></li> -->
                <!-- <li class="active">Data</li> -->
                <li class="active">Dashboard</li>
            </ol>
            @yield('sidebar')
        </div>
        <div class="col-md-9">
            <div class="container">
                @yield('content')
            </div>
        </div>
    </div>

    <footer class="flex">
        <span class="static-link legal"><a href="{{url('mentions')}}">Mentions légales</a></span>
        <span class="static-link contact"><a href="{{url('contact')}}">Contact</a></span>
    </footer>

    <!-- Scripts -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('js/javascript.js') }}"></script>

    <script src="/js/app.js"></script> <!-- Le script bootstrap -->
</body>
</html>