@extends('layouts.app')
@section('meta')
<title>Get Exclusive Cashback, Deals, Coupons & Discounts at Macklara</title>
<meta name="description" content="Discover the best cashback offers, unbeatable deals, exclusive coupons, and amazing discounts at Macklara. Shop smart and save big on your favorite brands with our money-saving opportunities. Start saving today!">
@endsection 
@section('content')
<div class="py-4 flex-grow-1">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="card shadow border-light rounded-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <p class="h3 fw-bold">{{ __('') }}{{ Auth::user()->name }}</p>
                                <p class="card-text">{{ __('') }}{{ Auth::user()->email }}</p>
                            </div>
                            <div class="col-md-4 ">
                                <p class="h3 fw-bold">Cash Back</p>
                                <p class="h5 fw-bold text-success">
                                {{$pendingBalance + $verifiedBalance + $payableBalance}} $
                                </p>
                            </div>
                            <div class="col-md-4">
                                <p class="h5 card-text ">Member Since: {{ Auth::user()->created_at->format('M Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="card shadow border-light rounded-3 mb-4">
        <div class="card-body">
            <p class="h3 fw-bold">Payouts <span class="h5 card-text "><a href="{{ url('payouts') }}">click here</a></span></p>
        </div>
        </div>
        <div class="card shadow border-light rounded-3 mb-4">
        <div class="card-body">
          <p class="h3 fw-bold">Account Settings <span class="h5 card-text "><a href="{{ url('account-details') }}">change</a></span></p>
        </div>
        </div>




    
      <div class="card shadow border-light rounded-3 ">
      <div class="card-body">
      <h2 class="card-title fw-bold">{{ __('Trips') }}</h2>
   <table class="table">
   <thead>
    <tr>
      <th class="h6 fw-bold">Date</th>
      <th class="h6 fw-bold">Store</th>
      <th class="h6 fw-bold">Trip Number</th>
      <th class="h6 fw-bold">Order Info</th>
    </tr>
   </thead>
   @foreach ($trips->reverse() as $trip)
    <tr>
    <td>{{ \Carbon\Carbon::parse($trip->created_at)->format('m/d/Y g:i A') }}</td>
    <td>{{ $trip->p_store }}</td>
    <td>{{ $trip->trip_id }}</td>
    <td>{{ $trip->pending }}</td>
    </tr>
    @endforeach 
  
</table>
<div class="d-flex justify-content-center">
   <a href="{{ url('trips') }}" class="text-center btn btn-custom-color">More Trips</a>
</div>

          </div>
       </div>
     </div>
    </div></div>


@include('layouts.footer')
@endsection 
