@extends('layouts.app')
@section('meta')
<title>Get Exclusive Cashback, Deals, Coupons & Discounts at Macklara</title>
<meta name="description" content="Discover the best cashback offers, unbeatable deals, exclusive coupons, and amazing discounts at Macklara. Shop smart and save big on your favorite brands with our money-saving opportunities. Start saving today!">
@endsection     
@section('content')

<search id="app1" class="py-3"></search> 

<div class="container g-4 mt-3">
<strong class="h2 fw-bold mt-3">Find The Best Coupons</strong><br><br>
<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-2 row-cols-xlg-2">
  @foreach($coupons as $coupon)
<div class="col px-2"> 
@if($coupon->company)
  <div class="card  mb-3 shadow border-light rounded-3 " style="max-width: 55rem;">
  <div class="  row m-0 py-2">
    <a href="{{ url('coupons', ['id' => $coupon->id]) }}" class="col-2 m-0 p-0"target="_blank">
    <img loading="auto" src="{{ asset('images/company/1.jpg') }}" class="card-img-top rounded-4"  alt="..." >
    </a>
    <div class="col-8 d-flex align-items-center"> 
      <div>
        <p class="h4 fw-bold  ms-1 mb-3">{{$coupon->c_title}}</p>
        @if($coupon->company->rate == null && $coupon->company->fix_amount == null)
        <p class="h5 text-custom-color   mb-0 pb-0">+ cashback Coming soon </p>
        @elseif($coupon->company->fix_amount !== null)
        <p class="h5  text-custom-color  mb-0 pb-0">+  ${{$coupon->company->fix_amount}} cashback</p>
        @else
        <p class="h5  text-custom-color  mb-0 pb-0">+ {{$coupon->company->rate}}% cashback</p>
        @endif
        </div>
      </div>
      <div class="col-2 m-0 p-0 d-flex align-items-center justify-content-center">
        <a class="fw-bold btn btn-outline-custom-color btn-md m-0 py-2 px-3 rounded-pill" 
        href="{{ url('coupons', ['id' => $coupon->id]) }}"  target="_blank">Shop</a>
      </div>
  </div>
  </div>
        @endif
</div>

@endforeach
 </div>
 @include('layouts.footer')
@endsection 
