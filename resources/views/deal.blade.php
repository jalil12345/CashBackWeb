@extends('layouts.app')
@section('meta')
<title>Get Exclusive Cashback, Deals, Coupons & Discounts at Macklara</title>
<meta name="description" content="Discover the best cashback offers, unbeatable deals, exclusive coupons, and amazing discounts at Macklara. Shop smart and save big on your favorite brands with our money-saving opportunities. Start saving today!">
@endsection 
@section('content')

   
<div class="container">
    @foreach($deal as $st)
               
                <div class="card my-2 shadow border-light rounded-3">
                    <div class="row ">
                    <div class="col-4">
                    @if($st->company)
                        <img src="{{ asset('images/36.jpg') }}" class="img-fluid rounded-start" alt="..." loading="lazy">
                        
                    </div>
                        <div class="col-8 my-2">
                        <p class="h2">{{$st->deal_title }}</p>
                        <p class="h5 text-success fw-bold">{{ __('%') }}</p>
                        <!-- <a href="{{ $st->url }}{{ $st->companies_click_id }}" class="btn btn-custom-color rounded-1">Shop Now</a> -->
                        <a href="#" >Shop Now</a>
                        </div>
                        
                        
                        </div></div>
              
              <div class="card my-2 shadow border-light rounded-3">
                    
                        <p class="h2 ms-1 text-center">{{$st->company->name }} Terms & Exclusions</p>
                     
                        
                        @endif
                </div>
                <!-- @endforeach
              @foreach($deal as $ste) -->
                
                <div class="card my-2 shadow border-light rounded-3">
                    <div class="row">
                    <div class="col-4 my-1">
                    @if($st->company)
                        <p class="h2 ms-1">{{$st->company->name }}</p>
                    </div>  
                    <div class="col-8 my-2">  
                        <p class="h5">{{ $st->id }}</p>
                        <a href="#" class="btn btn-custom-pink rounded-1">Get Coupon</a>
                    </div>
                    </div>
                        <div class="card-footer text-muted">
                        2 days ago</div>
                        @endif
                </div>
              @endforeach
        

<br><br><br><br><br><br>
</div>
@include('layouts.footer')
@endsection 
