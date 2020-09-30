<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Black Whale') }}</title>

    <!-- Scripts -->
    <script type="application/javascript" src="{{asset('js/app.js')}}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/joan.css') }}" rel="stylesheet">

    <!--bootstrap icon-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--Sweet Alert-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    {{-- website icon --}}
    <link rel="icon" href="/storage/img/74831-200.ico">

    {{-- date time picker --}}
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    
    @yield('style')
    
    <style>

        @import url('https://fonts.googleapis.com/css2?family=Anton&display=swap%27');
        
        div._Container
        {
            font-family: 'Anton';
            margin: 0 auto;
            padding: 0;
            text-align: center;
        }
        
        div._container
        {
            font-family: 'Anton';
            margin: 0 auto;
            padding: 20px 10px;
            text-align: center;
        }

        div._container a
        {
            color:  #fff;
            text-decoration: none;
            font: 20px 'Anton';
            letter-spacing: 5px;
            margin: 0px 10px;
            padding: 10px 10px;
            position: relative;
            z-index: 0;
            cursor: pointer;
        }
        .green 
        {
            background: rgba(245,181,38,1);
        }
        
        /* Border X get width  */
        div.borderXwidth a:before, div.borderXwidth a:after
        {
            position: absolute;
            opacity: 0;
            width: 0%;
            height: 2px;
            content: '';
            background: #FFF;
            transition: all 0.3s;
        }

        div.borderXwidth a:before
        {
            left: 0px;
            top: 0px;
        }

        div.borderXwidth a:after
        {
            right: 0px;
            bottom: 0px;
        }

        div.borderXwidth a:hover:before, div.borderXwidth a:hover:after
        {
            opacity: 1;
            width: 100%;
        }

    </style>
    @yield('style')

</head>

<body>
    <div>
        <div class="_Container">
            <div class="_container green borderXwidth">

            <!--left nav-bar-->
            @guest
                <a href="{{ url('/') }}">
                    {{ config('app.name', 'Black Whale') }}
                </a>
            @else
                    <a href="#">HOME</a>
                    <a href="/orders">USER ORDERS</a>
                    <a href="/teas">EDIT MENU</a>
                    <a href="/outlets">ADD OUTLET</a>
                    <a href="#">EVENT UPDATES</a>
            @endguest

            <!--right nav-bar-->
            @guest
                    <a href="{{ route('login') }}">{{ __('LOGIN') }}</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">{{ __('REGISTER') }}</a>
                @endif
            @else
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    {{ __('LOGOUT') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endguest
            
        </div>
    </div>

    <main class="py-4">
        <div id="app">

            @yield('content')
        
        </div>
    </main>
    
    @include('sweetalert::alert')
</body>
</html>
