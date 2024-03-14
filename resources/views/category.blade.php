@extends('layouts.app')
@section('meta')
<title>Get Exclusive Cashback, Deals, Coupons & Discounts at Macklara</title>
<meta name="description" content="Discover the best cashback offers, unbeatable deals, exclusive coupons, and amazing discounts at Macklara. Shop smart and save big on your favorite brands with our money-saving opportunities. Start saving today!">
@endsection 
@section('content')
<div class="container mb-3">
    <span class="h1 mb-3">All the stores from {{$store->first()->category }} category</span>
</div>
<div class="container">
<div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xlg-5">
    @foreach($store as $st)
    <div class="col ">
    <div class="card  mb-3 rounded-4" style="max-width: 18rem;">
    <div class="card-header bg-transparent ">  <strong class="h6 fw-bold">{{$st->name }} </strong>   </div>
    <div class="card-body">
    <a href="{{ url('stores/name',$st->name) }}">
  <img loading="auto" src="{{ asset('images/company/1.jpg') }}" class="card-img-top  rounded-4"  alt="..." 
  style=" max-width: 12rem; max-height:10rem;"></a>
    </div>
    <div class="card-footer bg-transparent "> 
      <strong class="h5 fw-bolder text-success"> {{ $st->rate }}{{ __('%') }} </strong>
                
      </div></div></div>  
              @endforeach


              <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
              </div></div>



              @include('layouts.footer')
@endsection 

    
