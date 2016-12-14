@include('includes.header')

    <div class="banner flex">
        <h2>
            Les Mathématiques c'est fantastique!
        </h2>
    </div>
    <div class="wrapper">
        <div class="contenu">
            <div class="content">
                @yield('content')
            </div>
            @section('sidebar')
                @include('includes.sidebar')
            @show
        </div>
    </div>

@include('includes.footer')