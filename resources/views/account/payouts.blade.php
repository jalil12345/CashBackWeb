@extends('layouts.app')
@section('meta')
<title>Get Exclusive Cashback, Deals, Coupons & Discounts at Macklara</title>
<meta name="description" content="Discover the best cashback offers, unbeatable deals, exclusive coupons, and amazing discounts at Macklara. Shop smart and save big on your favorite brands with our money-saving opportunities. Start saving today!">
@endsection 
@section('content')
<br>
<div class="container  h3">{{ __('Balance') }}</div>
<div class="container "> 
    <div class="bg-white shadow border-light rounded-3">
        <div class="row m-3 p-3 d-flex flex-column flex-md-row">
            <div class="col card m-2 flex-grow-1 shadow border-light rounded-3">
                <br>
                <p class="h6 ms-2">{{ __('Pending Balance : ') }}{{$pendingBalance}} $</p><hr>
                <p class="h6 ms-2">{{ __('Verified Balance : ') }}{{$verifiedBalance}} $</p><hr>
                <p class="h6 ms-2 fw-bold text-success">{{ __('Payable Balance : ') }}{{$payableBalance}} $</p><hr>
                <p class="h5 fw-bold ms-2 text-custom-pink">{{ __('Total Balance : ') }}{{$pendingBalance + $verifiedBalance + $payableBalance}} $</p><br>
            </div>
            <div class="col card m-2  flex-grow-1 shadow border-light rounded-3">
                <br><br><br>
                <p class="h4 ms-2 text-center text-success fw-bold">{{ __('Payable Balance  ') }}</p>
                <p class="h5 fw-bold text-success text-center">{{$payableBalance}} $</p>
                <br><br>
            </div> 
        </div>
    </div>
</div>
<br>

<div class="container">
    @if(session('paypalSuccessMessage'))
        <div class="alert alert-success alert-dismissible fade show mb-2 shadow">
            {{ session('paypalSuccessMessage') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
</div>

<div class="container  ">
  <div class="h3 ">{{ __('Payment Method') }}</div>
  <div class="card mb-3 shadow border-light rounded-3">
    <div class="card-body">
        <div class="float-start">
          <img src="Paypal_logo.png" alt="Paypal Logo" width="100" height="100">
        </div>
            @if($paypal_name != NULL)
            <div class="float-end">
              <a href="#" class="btn btn-custom-color"
              data-bs-toggle="modal"
              data-bs-target="#getPaymentModal"
              >Get Payment</a>
           </div>
              @else 
              <div class="float-end">
          <a href="{{ url('/paypal/authenticate') }}"
            style="text-decoration: none;">
            Connect Paypal</a>
            </div>
            @endif
        </div>
    </div>
  </div>
</div>


<br>
<div class="container  h3">
  <div class="h3">{{ __('Payouts History') }}</div>

</div>

<div class="container "><div class="card shadow border-light rounded-3">
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

</div></div>
<br><br><br>
@include('account.modal.get-payment-modal')
@include('layouts.footer')
@endsection 
