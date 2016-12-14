@include('includes.header')

    <div class="banner flex">
        <h2>
            Les Mathématiques <span>c'est fantastique!</span>
        </h2>
    </div>
    <div class="wrapper">
        <div class="contenu">
            @yield('content')
        </div>
    </div>

@include('includes.footer')