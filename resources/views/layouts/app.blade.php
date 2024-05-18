<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @yield('meta')
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- <title>{{ config('app.name', 'Laravel') }}</title> -->

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="{{ asset('js/recordClick.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
     <!-- Include Font Awesome -->
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
 <body class="d-flex flex-column min-vh-100"> <!-- navbar -->
    <div id="app">
        <nav class="navbar  sticky-top  navbar-expand-sm  bg-custom-color shadow-sm">
            <div  class="container-fluid m-auto p-auto input-group">    
                <a class="h4 wf-bolder me-1 pe-1 text-light " style="text-decoration: none;" href="{{ url('/') }}">
                <p class="container fw-bold h4 text-center mt-1 pb-0 mb-1" >ma<span class="h3 fw-bold  text-dark">ck</span>lara</p>
                </a>
            
                <button class="navbar-toggler " type="button" data-bs-toggle="collapse"
                 data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
                 aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                            
                <div class="collapse navbar-collapse rounded-3 " id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav mx-auto">
                    <li class="nav-item me-auto">
                                <a class="nav-link text-light wf-bold  h4" aria-current="page" href="{{ url('stores') }}"
                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Stores">Stores</a>
                            </li>
                            <li class="nav-item me-auto">
                            <a class="nav-link text-light  wf-bold h4"  href="{{ url('coupons') }}"
                            data-bs-toggle="tooltip" data-bs-placement="bottom" title="Coupons">Coupons</a>
                            </li>
                            <!-- <li class="nav-item me-auto">
                            <a class="nav-link text-light wf-bold h4" href="{{ url('deals') }}">Deals</a>
                            </li> -->
                            <li class="nav-item me-auto">
                            <a class="nav-link  text-light wf-bold h4" href="{{ url('favorites') }}">{{ __('Favorites') }}</a>
                            </li>
                            
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item me-auto">
                                    <a class="nav-link text-light" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item me-auto">
                                    <a class="nav-link text-dark btn btn-warning px-3 rounded-1 fw-bold" href="{{ route('register') }}">{{ __(' Join ') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown me-auto"id="navbarDropdown">
                                <a  class="nav-link dropdown-toggle text-light" href="#" role="button"
                                 data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                 {{ substr(Auth::user()->name, 0, 5) }}
                                    {{$pendingBalance + $verifiedBalance + $payableBalance}}$
                                </a>

                                <div class="dropdown-menu dropdown-menu-end rounded-3" aria-labelledby="navbarDropdown">
                                    
                                    <a class="dropdown-item" href="{{ url('profile') }}">{{ __('Profile') }}
                                       </a>
                                        <a class="dropdown-item" href="{{ url('payouts') }}">{{ __('Payouts') }}
                                          <span class="float-end fw-bold text-success">{{$pendingBalance + $verifiedBalance + $payableBalance}} $</span> 
                                        </a>
                                        <a class="dropdown-item" href="{{ url('trips') }}">{{ __('Trips') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ url('account-details') }}">{{ __('Account Settings') }}
                                        </a>
                                        <a class="dropdown-item" href="#footer">{{ __('Help') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        
                    </ul>
                </div>
                </div></div></div>
            
            
        </nav>
          
        <main class="py-2 flex-grow-1">
            @yield('content')
        </main>
    </div>
     
    @yield('footer')
   
</body>
</html>
