<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Cloud bank</title>
    <link rel="icon" href="/img/icon.ico"/>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
     <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script id='appJs' src="{{ asset('js/app.js') }}"></script>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-fixed-top" style="box-shadow: 0px 1px 3px rgba(0,0,0,0.3);">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" id="mobile-drop" class="navbar-toggle collapsed" data-toggle="collapse">
                        <img src="/img/user.png" alt="user photo" id="profile-img-icon"/>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand " style="color:white;padding: 10px" href="{{ url('/') }}" >
                        <i class="fa fa-cloud" style="font-size:1.5em;margin-right:.4em"></i>{{ config('app.name', ' Cloud Bank') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav lg-hidden" id="mobile-profile" >
                        <center>
                            <img src="/img/user.png" alt="user photo" id="profile-img" />
                            <h4 class="text-capitalize"  style="color:white">{{Auth::user()->first_name." ".Auth::user()->middle_name}}</h4>
                            <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();" style="display:block">
                                        <b  style="color:white;text-decoration: underline; ">Logout</b>
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                        </center>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        {{--  @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else  --}}
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"
                                style="padding-top: 5px;padding-bottom: 5px;" >
                                <b class="text-capitalize" style="color:white;display:inline;margin-right:1em">{{Auth::user()->first_name." ".Auth::user()->middle_name}}</b>
                                <img src="/img/user.png" alt="user photo" id="profile-img-icon-lg" style="display:inline"/>
                            </a>

                            <ul class="dropdown-menu text-center" role="menu" id="profile-dropdown" style="padding: 10%;" >
                                <center>
                                    <h4 class="text-capitalize">{{Auth::user()->first_name." ".Auth::user()->middle_name}}</h4>
                                    <img src="/img/user.png" alt="user photo" id="profile-img" />
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();" style="display:block">
                                    <button class="btn btn-warning">Logout</button> 
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                    
                                </center>
                            </ul>
                        </li>
                        {{--  @endif  --}}
                    </ul>
                </div>
            </div>
        </nav>
        <main>
            @yield('content')
        </main>
            <footer class="container navbar-inverse text-center" id="navigation">
                <ul class="navbar-nav navbar-center">
                    <li name='game' ><a href="/play game"><i class="fa fa-gamepad"></a></i></li>                
                    <li name='payment' ><a href="/payment"><i class="fa fa-shopping-cart"></a></i></li>
                    <li name='home' ><a href="/home"><i class="fa fa-home"></a></i></li>
                    <li name='account' ><a href="/account"><i class="fa fa-user-circle"></a></i></li>
                    <li name='info' ><a href="/info"><i class="fa fa-info-circle"></a></i></li>
                </ul>
            </footer>  
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        
    </script>
</body>
</html>
