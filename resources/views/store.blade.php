@extends('layouts.app')

@section('content')

   
<div class="container">
    @foreach($store as $st)
               

                <div class="card my-2">
                    <div class="row">
                    <div class="col-4">
                        <img src="{{ asset('images/36.jpg') }}" class="img-fluid rounded-start" alt="..." loading="lazy">
                        
                    </div>
                        <div class="col-8 my-2">
                        <p class="h2">{{$st->name }}</p>
                        <p class="h5 text-success fw-bold">{{ $st->rate }}{{ __('%') }}</p>
                        <!-- <a href="{{ $st->url }}{{ $st->companies_click_id }}" class="btn btn-pink rounded-1">Shop Now</a> -->
                        <a href="{{ $st->url }}{{ $st->companies_click_id }}" 
                           class="btn btn-pink rounded-1 store-link" 
                           data-store="{{ $st->name }}" 
                           data-cashback="{{ $st->rate }}"
                           data-redirect="{{ $st->url }}{{ $st->companies_click_id }}"
                           target="_blank" 
                           rel="noopener noreferrer">Shop Now</a>
                        </div>
                        </div></div>
              
              <div class="card my-2">
                    
                        <p class="h2 ms-1 text-center">{{$st->name }} Terms & Exclusions</p>
                     
                        
                        
                </div>
                @endforeach
              @foreach($store as $ste)
                
                <div class="card my-2">
                    <div class="row">
                    <div class="col-4 my-1">
                        <p class="h2 ms-1">{{$ste->name }}</p>
                    </div>  
                    <div class="col-8 my-2">  
                        <p class="h5">{{ $ste->id }}</p>
                        <a href="#" class="btn btn-custom-pink rounded-1">Get Coupon</a>
                    </div>
                    </div>
                        <div class="card-footer text-muted">
                        2 days ago</div>
                </div>
              @endforeach
        

<br><br><br><br><br><br>
</div>

@endsection 
