<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- <script src="{{ asset('js/jquery.js') }}"></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
 <body> <!-- navbar -->
    <div id="app">
        <nav class="navbar  sticky-top  navbar-expand-lg navbar-dark bg-custom-pink shadow-sm">
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
                            
                <div class="collapse navbar-collapse rounded-4 " id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <!-- <ul class="navbar-nav me-auto">
                    
                    </ul> -->
                            

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav mx-auto">
                    <li class="nav-item me-auto">
                                <a class="nav-link text-light wf-bold  h4" aria-current="page" href="stores">Stores</a>
                            </li>
                            <li class="nav-item me-auto">
                            <a class="nav-link text-light  wf-bold h4"  href="coupons">Coupons</a>
                            </li>
                            <li class="nav-item me-auto">
                            <a class="nav-link text-light wf-bold h4" href="deals">Deals</a>
                            </li>
                            <!-- <li class="nav-item">
                            <a class="nav-link text-light" href="deals">ServisesBlog</a>
                            </li> -->
                            <li class="nav-item me-2 ">
                            <a class="nav-link text-light wf-bold h4" href="blog" tabindex="" aria-disabled="true">Blog</a>
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
                                    <a class="nav-link text-light" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown me-auto"id="navbarDropdown">
                                <a  class="nav-link dropdown-toggle text-light" href="#" role="button"
                                 data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}{{ __(' 10 $') }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end rounded-4" aria-labelledby="navbarDropdown">
                                    
                                    <a class="dropdown-item" href="profile">{{ __('profile') }}
                                       </a>
                                        <a class="dropdown-item" href="account-details">{{ __('account details') }}
                                        </a>
                                        <a class="dropdown-item" href="payment-methods">{{ __('payouts') }}
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
                            <a class="dropdown-item" href="#">{{ __('About Us') }}</a>        
                            <a class="dropdown-item" href="#">{{ __('FAQs') }}</a>
                            <a class="dropdown-item" href="#">{{ __('How it works !') }}</a>
                            <a class="dropdown-item" href="#">{{ __('I didnt get my Cash Back!') }}</a>
                            <a class="dropdown-item" href="#">{{ __('How it work !') }}</a>
                            <a class="dropdown-item" href="privacy-policy">{{ __('Privacy Policy') }}</a>
                            <a class="dropdown-item" href="terms-conditions">{{ __('Terms & Conditions') }}</a></div>
                            </li>
                    </ul>
                </div>
                </div></div></div>
            
            
        </nav>
           <div class="dropdown  container mt-4 ">
                    <form class="d-flex  "  method="GET" action="{{ URL::to('/search') }}" >
                    <input  
                    id="navbarDropdown0"
                    data-bs-toggle="dropdown" aria-haspopup="true"
                    data-bs-display="static" aria-expanded="false" v-pre
                    name="search" 
                    class="form-control mx-auto  rounded-1 bg-info" 
                    type="search" 
                    placeholder="Search..." 
                    aria-label="Search"
                    autocomplete="off"
                    value="{{ request()->get('search') }}">
                    <!-- <button class="btn btn-custom-pink btn-outline-light rounded-0 rounded-end px-auto mx-auto" type="submit">Search</button>    -->
                    
                    
                    <div class="dropdown-menu dropdown-menu-end rounded-1 dropdown-menu 
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
                </div>          
                        
                        
                        
        
        <main class="py-4">
            @yield('content')
        </main>
    </div>



    <div class="container-fluid bg-secondary">
     <nav class="navbar  navbar-light bg-secondary ">
    
    <a class="navbar-brand text-white" href="#">Macklara</a></nav>
    
    <div class="bg-secondary h6 text-center " ><p class="">
            <a class=" text-white px-3" href="#" style="text-decoration: none;"> Macklara  </a>||
            <a class=" text-white px-3" href="#" style="text-decoration: none;"> Macklara     </a>||
            <a class=" text-white px-3" href="#" style="text-decoration: none;"> Macklara      </a> ||
            <a class="text-white px-3" href="privacy-policy" style="text-decoration: none;">{{ __('Privacy Policy  ') }}</a>||
            <a class="text-white px-3" href="terms-conditions" style="text-decoration: none;">{{ __('Terms & Conditions') }}</a>
            </p>
    </div><br>
    
    <div class="ml-4 text-center text-sm text-light sm:text-right sm:ml-0">
                        All right reserve to Macklara 2022 &copy
                    </div><br>
    </div>
    
    <script>
        const inputBox = document.getElementById("navbarDropdown0");
    const suggBox = document.getElementById("auto0");
    
    const getSearch =(e)=>{
        let userData=e.target.value;
        console.log(userData);  
     axios.get('http://127.0.0.1:8000/api/companies?search='+userData,{
            
        }).then(response=>{
            console.log(response.data.length);
            for (let index = 0; index < response.data.length; index++) {
                 let element = response.data[index].name;
                 let category = response.data[index].category;
                 console.log(element);
                 console.log(category);
                 
                //  suggBox0.innerHTML='<li><a class="dropdown-item" href="#">'+element+'</a></li>'+
                //  '<li><a class="dropdown-item" href="#">'+email+'</a></li>';
            }
            let txt = "";
            response.data.forEach(myFunction);
            document.getElementById("auto0").innerHTML = txt;
            function myFunction(value) {
                        txt +='<li><a class="dropdown-item" href="#">'+value.name+'</a></li>'+
                        '<li><a class="dropdown-item" href="#">'+value.category+'</a></li>'; 
                        }
            // suggBox.innerHTML=;
        }).catch(err=>{
            console.log(err);
        });  
    };
   
    inputBox.addEventListener('keyup',getSearch);

//     let suggestions=[
//         "Abc","bac","cab","dfg","edu","zkl","sdc","sdc",
//     ];
//    const inputBox = document.getElementById("navbarDropdown0");
//    const suggBox = document.getElementById("auto0");

//    inputBox.onkeyup = (e)=>{
//     let userData=e.target.value;
//     let emptyArray=[];
//     if(userData){
//         emptyArray=suggestions.filter((data)=>{
//             return data.toLocaleLowerCase()
//             .startsWith(userData.toLocaleLowerCase());
//         });
//         emptyArray =emptyArray.map((data)=>{
//             return data = '<li class="dropdown-item h5">'+data+'</li>';
//         });
//         showSuggestions(emptyArray);
//         let allList=suggBox.querySelectorAll("li");
//         console.log(allList);
//         for (let i = 0; i < allList.length; i++) {
//             allList[i].setAttribute("onclick","select(this)"); // put search action insted of select
            
//         }
//     }else{

//     }
//     //  showSuggestions(emptyArray);
//    }

//    function select(element){
//     let selectUserData=element.textContent;
//     inputBox.value=selectUserData;
//    }

//    function  showSuggestions(list){
//     let listData;
//     if(!list.length){
//             userValue=inputBox.value;
//             listData='<li>'+userValue+'</li>';
//     }else{
//         listData=list.join('');
//     }
//        suggBox.innerHTML=listData+'<p class="h5 text-center text-custom-pink fw-bold">deals</p>'; 
//    }

   

</script>
</body>
</html>
