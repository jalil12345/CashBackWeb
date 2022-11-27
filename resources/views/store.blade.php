@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($store as $st)
               <h1 class="h1 text-center">{{$st->name }}{{ __(' Coupons & Deals') }}</h1> 

                <div class="card my-2">
                    <div class="row">
                    <div class="col-4">
                        <img src="..." class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-8 my-2">
                        <p class="h2">{{$st->name }}</p>
                        <p class="h5 text-success fw-bold">{{ $st->rate }}{{ __('%') }}</p>
                        <a href="#" class="btn btn-custom-pink rounded-1">Shop Now</a>
                        </div>
                        </div></div>
              @endforeach
              @foreach($store as $ste)
                
                <div class="card">
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
        

<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>

@endsection 
