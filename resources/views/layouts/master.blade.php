<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>E-Lycée</title>
</head>
<body>
<header>
    <div>
        <div class="facebook">facebook</div>
        <div class="connexion">connexion</div>
        <div class="rs">rs</div>
    </div>
    <div class="header">
        <h1><a href="{{url('')}}">E-Lycée</a></h1>
    </div>
    <nav class="menu">
        <ul class="flexible">
            <li>
                <a href="fanfictions.php" class="w_open">Fanfictions</a>
            </li>
            <li>
                <a href="fanarts.php" class="w_open">Fanarts</a>
            </li>
            <li>
                <a href="{{ url('category', [1]) }}">PHP</a>
            </li>
            <li>
                <a href="{{ url('category', [2]) }}">MySQL</a>
            </li>
        </ul>
    </nav>
</header>
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
<footer></footer>
</body>
</html>