@extends('layouts.app')
@section('meta')
<title>Get Exclusive Cashback, Deals, Coupons & Discounts at Macklara</title>
<meta name="description" content="Discover the best cashback offers, unbeatable deals, exclusive coupons, and amazing discounts at Macklara. Shop smart and save big on your favorite brands with our money-saving opportunities. Start saving today!">
@endsection 
@section('content')
    <!-- Page Content -->
    <div class="container">
    <img src="{{ asset('images/macklara3.gif') }}" class="d-block w-100 img-fluid" alt="..."
      style=" max-width: rem; max-height:22rem;">
    </div>
    <div class="container my-5">
      <div class="row">
        <div class="col-lg-6">
          <h1 class="fw-bold mb-3">About Us</h1>
          <p class="h5">At Macklara, we believe that everyone deserves to save money on their online shopping. That's why we created a cashback website that offers unbeatable cashback rates and an easy-to-use platform that makes it simple for you to earn cashback on your online purchases.</p>
          <p class="h5">We will work tirelessly to find the best deals and offers from the top retailers, so you can shop with confidence and know that you're getting the best possible deal.</p>
          <p class="h5">Join our community of savvy shoppers and start earning cashback on your online purchases today!</p>
        </div>
        <!-- <div class="col-lg-6 ">
          <img src="https://via.placeholder.com/600x400" class="img-fluid rounded" alt="About Us Image" />
          <div class="card-img-overlay">
          <strong class="h6 fw-bold  ">AAaaa</strong >
          </div>
        </div> -->
      </div>
    </div>

    @include('layouts.footer')
@endsection 