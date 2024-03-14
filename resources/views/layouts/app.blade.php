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
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/recordClick.js') }}"></script>

    <!-- <script src="{{ asset('js/jquery.js') }}"></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
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
                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Stores">Store</a>
                            </li>
                            <li class="nav-item me-auto">
                            <a class="nav-link text-light  wf-bold h4"  href="{{ url('coupons') }}"
                            data-bs-toggle="tooltip" data-bs-placement="bottom" title="Coupons">Coupon</a>
                            </li>
                            <!-- <li class="nav-item me-auto">
                            <a class="nav-link text-light wf-bold h4" href="{{ url('deals') }}">Deals</a>
                            </li> -->
                            <li class="nav-item me-auto">
                            <a class="nav-link  text-light wf-bold h4" href="{{ url('favorites') }}">{{ __('Favorite') }}</a>
                            </li>

                            <li class="nav-item dropdown me-auto">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" 
                        role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ __('More') }}
                                </a>

                            <div class="dropdown-menu dropdown-menu-end rounded-end rounded-start" aria-labelledby="navbarDropdown">
                            <!-- <a class="dropdown-item text-success" href="{{ url('membership-plans') }}">{{ __('Membership Plans') }}
                            </a> -->
                            <a class="dropdown-item" href="{{ url('about-us') }}">{{ __('About Us') }}</a> 
                            <a class="dropdown-item" href="{{ url('contact-us') }}">{{ __('Contact Us') }}</a>        
                            <a class="dropdown-item" href="{{ url('how-it-works') }}">{{ __('FAQs') }}</a>
                            <a class="dropdown-item" href="{{ url('how-it-works') }}">{{ __('How it works !') }}</a>                            <a class="dropdown-item" href="{{ url('privacy-policy') }}">{{ __('Privacy Policy') }}</a>
                            <a class="dropdown-item" href="{{ url('terms-conditions') }}">{{ __('Terms & Conditions') }}</a></div>
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
                                    {{ Auth::user()->name }}{{ __(' $') }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end rounded-3" aria-labelledby="navbarDropdown">
                                    
                                    <a class="dropdown-item" href="{{ url('profile') }}">{{ __('Profile') }}
                                       </a>
                                        <a class="dropdown-item" href="{{ url('payouts') }}">{{ __('Payouts') }}{{ __('$') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ url('trips') }}">{{ __('Trips') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ url('account-details') }}">{{ __('Account Settings') }}
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
