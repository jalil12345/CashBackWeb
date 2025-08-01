 @extends('layouts.app')
 @section('meta')
<title>Get Exclusive Cashback, Deals, Coupons & Discounts at Macklara</title>
<meta name="description" content="Discover the best cashback offers, unbeatable deals, exclusive coupons, and amazing discounts at Macklara. Shop smart and save big on your favorite brands with our money-saving opportunities. Start saving today!">
@endsection 
@section('content')
<div class="container">
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
</div>

 <search id="app1" class="py-3"></search>  
    <!-- Button to add extension -->
    <!-- <button id="addExtensionButton" class="btn btn-custom-color">Add Extension</button> -->
    
    <!-- Button for extension users -->
    <!-- <button id="extensionButton" class="btn btn-custom-color" style="display: none;">Extension Button</button> -->
<!-- <div class=" mx-2">
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item " data-bs-interval="1000">
      <img src="{{ asset('images/macklara.png') }}" class="d-block w-100 img-fluid" alt="..."
      style=" max-width: rem; max-height:22rem;">
    </div>
    <div class="carousel-item active" data-bs-interval="3000">
      <img src="{{ asset('images/macklara3.gif') }}" class="d-block w-100 img-fluid" alt="..."
      style=" max-width: rem; max-height:22rem;">
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="{{ asset('images/macklara.png') }}" class="d-block w-100 img-fluid" alt="..."
      style=" max-width: rem; max-height:22rem;">
    </div>
  </div>
  <button class="carousel-control-prev " type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
    <span class="carousel-control-prev-icon bg-custom-color rounded-pill " aria-hidden="true"> </span>
    <span class="visually-hidden ">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
    <span class="carousel-control-next-icon bg-custom-color rounded-pill" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</div> -->

<div class="container"> 
  <!-- <strong class="h2  pe-2 fw-bolder "> Best Deals Today </strong> <a href="{{ url('deals') }}" class="h6">See All</a>
  <br><br></div>

  <div class="container ">
  <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 row-cols-xlg-5">
  <div class="col "> 

    <div class="card  mb-3 rounded-4 shadow border-light " style="max-width: 18rem;">
      <div class="card-header bg-transparent ">  <strong class="h6 fw-bold">Product name </strong>   </div>
      <div class="card-body">
      <a href="#">
    <img loading="auto" src="{{ asset('images/company/1.jpg') }}" class="card-img-top  rounded-4"  alt="..." 
    style=" max-width: 12rem; max-height:10rem;"></a>
    </div>
    <div class="card-footer bg-transparent "> 
      <strong class="h5 fw-bolder"> 5$  </strong>
      <small class="text-secondary text-decoration-line-through">$10</small> 
      + <small class="text-secondary">free shiping</small> <br>  <strong class="h6 fw-bolder text-success">+ 5% cashback </strong> 
    </div>

  </div>
</div></div> -->

  
<strong class="h2  pe-2 fw-bolder ">Stores </strong> <a href="{{ url('stores') }}" class="h6">See All</a>
<br></div>
  <br>
  <div class="container ">
  <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 row-cols-xlg-5">
  @foreach($stores as  $store)
        
  <div class="col mb-1"> 
    <div class="card mx-0 mb-2 rounded-4 shadow border-light" style="max-width: 18rem;">
      <div class="card-body">
      <a href="{{ url('stores/name/' . $store->name) }}" class="my-0 py-0 mx-0 px-0">
      <img  loading="auto" src="{{ asset('images/company/g.png') }}" 
            class="card-img-top  rounded-3 img-fluid m-0 p-0"  alt="..." 
            style=" max-width: 12rem; max-height:10rem;"> </a>
      </div>
    </div> 
    <p class=" bg-light border-light text-center"> 
        @if(($store->rate == null || $store->rate == 0)  && ($store->fix_amount == null || $store->fix_amount == 0))
        <strong class=" fw-bolder text-custom-color">Coming Soon</strong> 
        @elseif ($store->rate == null || $store->rate == 0)
        <strong class=" fw-bolder text-custom-color">${{formatCashback($store->fix_amount)}} Cashback</strong> 
        @else
        <strong class=" fw-bolder text-custom-color">{{formatCashback($store->rate)}}% Cashback</strong> 
        @endif
    </p> 
  </div> 
   @endforeach
  </div>
   <!-- <div class="container">
 <back-to-the-top-component id="app5"></back-to-the-top-component>
 </div> -->


    <div class="d-flex align-items-center">
      <h2 class="mb-0 me-3 fw-bolder">Coupons</h2>
      <a href="{{ url('coupons') }}" class="h6 mb-0">See All</a>
      </div></div>
<br>
  <div class=" container ">
<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-2 row-cols-xlg-2">
@foreach($coupons as $coupon)
<div class="col px-2"> 
  <div class="card  mb-3 shadow border-light rounded-3 " style="max-width: 55rem;">
    <div class=" row m-0 py-2">
    <a href="{{ url('coupons', ['id' => $coupon->id]) }}" 
    class="col-3 m-0 p-0">
    <img loading="auto" src="{{ asset('images/company/1.jpg') }}" class="card-img-top  rounded-4 "  alt="..." 
    style=" max-width: 8rem; max-height:8rem;"></a>
    <div class="col-6 d-flex align-items-center">
        <div>
        <p class="h4 fw-bold  ms-1 mb-3">{{$coupon->c_title}}</p>
        @if($coupon->company_id == null)
                    <!-- Do not display anything if company_id is null -->
         @else
        @if($coupon->company->rate == null && ($coupon->company->fix_amount == null || $coupon->company->fix_amount == 0))
            <p class=" text-custom-color mb-0 pb-0">Cashback Coming Soon </p >
        @elseif ($coupon->company->rate == null)
            <p class=" text-custom-color mb-0 pb-0">+${{formatCashback($coupon->company->fix_amount)}} Cashback</p>
        @else
            <p class=" text-custom-color mb-0 pb-0">+{{formatCashback($coupon->company->rate)}}% Cashback</p>
        @endif
        @endif
       </div>
    </div>
      
      <div class="col-3 m-0 p-0 d-flex align-items-center justify-content-center">
      <a class="fw-bold btn btn-outline-custom-color btn-md m-0 py-2 px-3 rounded-pill" 
        href="{{ url('coupons', ['id' => $coupon->id]) }}"  target="_blank">Shop</a>
    </div>
      
    </div>
  </div></div>
  @endforeach
  </div>
 

  <script>
   window.onload = function () {
            // Check if the extension is installed by looking for the injected identifiable element
            var extensionMarker = document.getElementById('macklaraExtensionMarker');

            if (extensionMarker) {
                // Extension is installed
                console.log('Macklara extension is installed');

                // Show UI elements for extension users
                var extensionButton = document.getElementById('extensionButton');
                if (extensionButton) {
                    extensionButton.style.display = 'block'; // Show the extension button
                }
            } else {
                // Extension is not installed
                console.log('Macklara extension is not installed');

                // Show button to add extension
                var addExtensionButton = document.getElementById('addExtensionButton');
                if (addExtensionButton) {
                    addExtensionButton.style.display = 'block'; // Show the button to add the extension
                }
            }
        };
  </script>
@include('layouts.footer')
@endsection 
