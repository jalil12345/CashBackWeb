@extends('layouts.app')
@section('meta')
<title>Get Exclusive Cashback, Deals, Coupons & Discounts at Macklara</title>
<meta name="description" content="Discover the best cashback offers, unbeatable deals, exclusive coupons, and amazing discounts at Macklara. Shop smart and save big on your favorite brands with our money-saving opportunities. Start saving today!">
@endsection 
@section('content')
<br>
<div class="container  h3">{{ __('Balance') }}</div>

<div class="container "> <div class="bg-white shadow border-light rounded-3">
  <div class="row m-3 p-3 d-flex flex-column flex-md-row">
  
  <div class="col card m-2 flex-grow-1">
    
                  <br><p class=" h6 ms-2 ">{{ __(' Pending Balance : ') }}0$</p><hr>
                      <p class=" h6 ms-2 ">{{ __(' Verified Balance : ') }}0$</p><hr>
                      <p class=" h6 ms-2 fw-bold text-success">{{ __(' Payable Balance : ') }}0$</p><hr>
                      <p class=" h5 fw-bold ms-2 text-custom-pink">{{ __('Total Balance : ') }}0$</p><br>
  </div>
  <div class="col card m-2  flex-grow-1 ">
    <br><br><br><p class=" h4 ms-2 text-center text-success fw-bold">{{ __(' Payable Balance  ') }}</p>
    <p class=" h5 fw-bold  text-success text-center">0$</p>
    <div class="text-center">
        <button class="btn btn-custom-color">Request Payment</button>
    </div>
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
        <div class="float-end">
            @if($paypal_name != NULL)
                    <div class="text-success">
                      <span class=" me-0">Connected</span>   
                    <svg class="mb-1"xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                   </svg>
                    </div>
              @else
          <a href="{{ url('/paypal/authenticate') }}"
            style="text-decoration: none;">
            Connect Paypal</a>
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
      <th class="h6 fw-bold">Date & Time</th>
      <th class="h6 fw-bold">Amount</th>
      <th class="h6 fw-bold">Method</th>
      <th class="h6 fw-bold">Status</th>
    </tr>
</thead>
  
    <tr>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>@mdo</td>
    </tr>
    
  
</table>
</div></div>

@include('layouts.footer')
@endsection 
