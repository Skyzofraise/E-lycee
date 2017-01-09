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

<div class="main-content">
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header navbar-collapse">
                    <ul class="nav navbar-nav">
                        <!-- <li class="navbar-brand">E-Lycée</li> -->
                        <li><a href="{{url('/dashboard')}}" class="navbar-brand">E-Lycée</a></li>
                        <li><a href="{{url('')}}">Retourner au site public</a></li>
                    </ul>
                </div>
                <div id="navbar" class="navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="">Nom du prof</a></li>
                        <li><a href="">Déconnexion</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div><!--/.container-fluid -->
        </nav>
    </header>

    <section class="row">

        <nav class="col-md-2">
            <ul class="nav">
                <li><a href="{{url('/dashboard')}}">Dashboard</a></li>
                <li><a href="">Elèves</a></li>
                <li><a href="">Articles</a></li>
                <li><a href="">Fiches</a></li>
            </ul>
        </nav>
        <!-- @yield('sidebar') -->

        <article class="col-md-10" >
                @yield('content')
        </article>
    </section>

</div>


    <!-- Scripts -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('js/javascript.js') }}"></script>

    <script src="/js/app.js"></script> <!-- Le script bootstrap -->
</body>
</html>