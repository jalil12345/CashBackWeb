<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Get Exclusive Cashback, Deals, Coupons & Discounts at Macklara</title>
    <meta name="description" content="Discover the best cashback offers, unbeatable deals, exclusive coupons, and amazing discounts at Macklara. Shop smart and save big on your favorite brands with our money-saving opportunities. Start saving today!">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- <title>{{ config('app.name', 'Laravel') }}</title> -->

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- <script src="{{ asset('js/jquery.js') }}"></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
</head>
 <body> <!-- navbar -->
    <div id="app">
        <nav class="navbar  sticky-top  navbar-expand-lg navbar-dark bg-pink shadow-sm">
            <div  class="container-fluid m-auto p-auto input-group">    
                <a class="h4 wf-bolder me-1 pe-2 text-light " style="text-decoration: none;" href="{{ url('/') }}">
                <p class="container fw-bold h4 text-center mt-1 pb-0 mb-1" >ma<span class="h3 fw-bold  text-dark">ck</span>lara</p>
                </a>
                <!-- search -->
                  <!-- <div class="dropdown   ">
                    <form class="d-flex  "  method="GET" action="{{ URL::to('/search') }}" >
                    <input  
                    id="navbarDropdown0"
                    data-bs-toggle="dropdown" aria-haspopup="true"
                    data-bs-display="static" aria-expanded="false" v-pre
                    name="search" 
                    class="form-control mx-auto  rounded-1" 
                    type="search" 
                    placeholder="Search..." 
                    aria-label="Search"
                    style="max-width: 20rem ;min-width: 18rem ;"
                    autocomplete="off"
                    value="{{ request()->get('search') }}"> 
                     <button class="btn btn-custom-pink btn-outline-light rounded-0 rounded-end px-auto mx-auto" type="submit">Search</button> 
                    
                    
                    <div class="dropdown-menu dropdown-menu-end rounded-1 dropdown-menu dropdown-menu-end dropdown-menu-sm-start " 
                    aria-labelledby="navbarDropdown0"
                    style="max-width:18rem;min-width:17rem;"
                    id="auto0"
                    >
                     <a class="dropdown-item" href="#">{{ __('About Us About Us About Us ') }}</a>        
                     <a class="dropdown-item" href="#">{{ __('FAQs') }}</a>
                     <li><hr class="dropdown-divider"></li>
                    <a class="dropdown-item" href="#">{{ __('How it works !') }}</a>
                    </div> 
                    </form>
                </div> -->
                

                <button class="navbar-toggler " type="button" data-bs-toggle="collapse"
                 data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
                 aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                            
                <div class="collapse navbar-collapse rounded-3 " id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <!-- <ul class="navbar-nav me-auto">
                    
                    </ul> -->
                            

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav mx-auto">
                    <li class="nav-item me-auto">
                                <a class="nav-link text-light wf-bold  h4" aria-current="page" href="{{ url('stores') }}">Stores</a>
                            </li>
                            <li class="nav-item me-auto">
                            <a class="nav-link text-light  wf-bold h4"  href="{{ url('coupons') }}">Coupons</a>
                            </li>
                            <li class="nav-item me-auto">
                            <a class="nav-link text-light wf-bold h4" href="{{ url('deals') }}">Deals</a>
                            </li>
                            <!-- <li class="nav-item">
                            <a class="nav-link text-light" href="deals">ServisesBlog</a>
                            </li> -->
                            <!-- <li class="nav-item me-2 ">
                            <a class="nav-link text-light wf-bold h4" href="blog" tabindex="" aria-disabled="true">Blog</a>
                            </li> -->
                            
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item me-auto">
                                    <a class="nav-link text-light" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item me-auto">
                                    <a class="nav-link text-dark btn btn-warning px-3 rounded-1" href="{{ route('register') }}">{{ __(' Sign up ') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown me-auto"id="navbarDropdown">
                                <a  class="nav-link dropdown-toggle text-light" href="#" role="button"
                                 data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}{{ __(' 10 $') }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end rounded-3" aria-labelledby="navbarDropdown">
                                    
                                    <a class="dropdown-item" href="{{ url('profile') }}">{{ __('profile') }}
                                       </a>
                                        <a class="dropdown-item" href="{{ url('account-details') }}">{{ __('account details') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ url('payouts') }}">{{ __('payouts') }}
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
                        <li class="nav-item dropdown me-auto">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" 
                        role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ __('Help') }}
                                </a>

                            <div class="dropdown-menu dropdown-menu-end rounded-end rounded-start" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('about-us') }}">{{ __('About Us') }}</a> 
                            <a class="dropdown-item" href="{{ url('contact-us') }}">{{ __('Contact Us') }}</a>        
                            <a class="dropdown-item" href="{{ url('how-it-works') }}">{{ __('FAQs') }}</a>
                            <a class="dropdown-item" href="{{ url('how-it-works') }}">{{ __('How it works !') }}</a>
                            <a class="dropdown-item" href="{{ url('how-it-works') }}">{{ __('I didnt get my Cash Back!') }}</a>
                            <a class="dropdown-item" href="{{ url('privacy-policy') }}">{{ __('Privacy Policy') }}</a>
                            <a class="dropdown-item" href="{{ url('terms-conditions') }}">{{ __('Terms & Conditions') }}</a></div>
                            </li>
                    </ul>
                </div>
                </div></div></div>
            
            
        </nav>
           <!-- <div class="dropdown  container mt-3">
                    <form class="d-flex  "  method="GET" action="{{ URL::to('/search') }}" >
                    <input  
                    id="navbarDropdown0"
                    data-bs-toggle="dropdown" aria-haspopup="true"
                    data-bs-display="static" aria-expanded="false" v-pre
                    name="search" 
                    class="form-control mx-auto rounded-3  bg-info" 
                    type="search" 
                    placeholder="Search..." 
                    aria-label="Search"
                    autocomplete="off"
                    value="{{ request()->get('search') }}"> -->
                    <!-- <button class="btn btn-custom-pink btn-outline-light rounded-0 rounded-end px-auto mx-auto" type="submit">Search</button>    -->
                    
                    
                    <!-- <div class="dropdown-menu dropdown-menu-end rounded-3 dropdown-menu 
                    dropdown-menu-end dropdown-menu-sm-start " 
                    aria-labelledby="navbarDropdown0"
                    style="min-width:17rem;"
                    id="auto0"
                    >
                     <a class="dropdown-item" href="#">{{ __('About Us About Us About Us ') }}</a>        
                     <a class="dropdown-item" href="#">{{ __('FAQs') }}</a>
                     <li><hr class="dropdown-divider"></li>
                    <a class="dropdown-item" href="#">{{ __('How it works !') }}</a>
                    </div> 
                    </form>
                </div>           -->
                          
                        
        
        <main class="py-4">
            @yield('content')
        </main>
    </div>



    <div class="container-fluid bg-secondary">
     <nav class="navbar  navbar-light bg-secondary ">
    
    <a class="navbar-brand text-white" href="#">Macklara</a></nav>
    
    <div class="bg-secondary h6 text-center " ><p class="">
      <a class=" text-white px-3" href="{{ url('#') }}" style="text-decoration: none;"> Disclaimer   </a>||
      <a class=" text-white px-3" href="{{ url('#') }}" style="text-decoration: none;"> FAQs </a>||
      <a class=" text-white px-3" href="{{ url('contact-us') }}" style="text-decoration: none;"> Contact Us  </a> ||
      <a class=" text-white px-3" href="{{ url('about-us') }}" style="text-decoration: none;"> About Us  </a> ||
      <a class="text-white px-3" href="{{ url('privacy-policy') }}" style="text-decoration: none;">{{ __('Privacy Policy  ') }}</a>||
      <a class="text-white px-3" href="{{ url('terms-conditions') }}" style="text-decoration: none;">{{ __('Terms & Conditions') }}</a>
           </p>
    </div><br>
    
    <div class="ml-4 text-center text-sm text-light sm:text-right sm:ml-0">
                        All right reserve to Macklara 2023 &copy 
                    </div><br>
    </div>
    
   
</body>
</html>
