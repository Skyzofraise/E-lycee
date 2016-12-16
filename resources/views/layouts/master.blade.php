@include('includes.header')

    @section('banner')
    <div class="banner flex">
        <h2>
            Les Mathématiques <span>c'est fantastique!</span>
        </h2>
    </div>
    @show
    <div class="wrapper">
        <div class="contenu flex">
            <div class="content">
                @yield('content')
            </div>
            @section('sidebar')
                @include('includes.sidebar')
            @show
        </div>
    </div>

@include('includes.footer')