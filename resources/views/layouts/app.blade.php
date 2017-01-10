<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}">
    <link href="/css/app.css" type="text/css" rel="stylesheet">

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
                            <li><a href="{{url('/dashboard')}}" class="navbar-brand">E-Lycée Dashboard</a></li>
                            <li><a href="{{url('')}}">Retourner au site public</a></li>
                        </ul>
                    </div>
                    <div id="navbar" class="navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                @if (Auth::check() == true)
                                    <a href="">{{ Auth::user()->username }}</a>
                                @endif
                            </li>
                            <li><a href="">Déconnexion</a></li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div><!--/.container-fluid -->
            </nav>
        </header>

        @yield('content')

    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
