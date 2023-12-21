@extends('layouts.app')

@section('content')
<br>
<div class="container  h3">{{ __('Balance') }}</div>

<div class="container "> <div class="card shadow border-light rounded-3">
  <div class="row ">
  
  <div class="col "><br><p class=" h6 ms-2 ">{{ __(' Pending Balance : ') }}0$</p><hr>
                      <p class=" h6 ms-2 ">{{ __(' Verified Balance : ') }}0$</p><hr>
                      <p class=" h6 ms-2 fw-bold text-success">{{ __(' Payable Balance : ') }}0$</p><hr>
                      <p class=" h5 fw-bold ms-2 text-custom-pink">{{ __('Total Balance : ') }}0$</p><br>
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
  <div class="h3 ">{{ __('Payout Request') }}</div>
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
<div class="container  ">
  <div class="h3 ">{{ __('Payout Request') }}</div>

<div class="card shadow border-light rounded-3">
  <div class="card-body">
    <div class="row">
      <div class="col">
        <img src="paypal_logo.png" alt="PayPal Logo" width="100" height="100">
      </div>
      <div class="col">
       
      @if ($paymentMethods->isEmpty())
        <a href="#" class="card-link  h5 btn btn-pink" style="text-decoration: none;"
        data-bs-toggle="modal" data-bs-target="#paypalEmailAssousiated">Enter Your PayPal Associated Email </a>
      
       @else
       @if ($paymentMethod->email_verification == false)
            
           <form action="{{ route('email.send') }}" method="POST">
             @csrf
             <button type="submit" class="card-link  h5 btn btn-pink" style="text-decoration: none;">
             Verify Your Email </button>
               @if (Route::currentRouteName() === 'email.send')
               @include('account.send')
                @endif
             </form>
        @elseif($paymentMethod->email_verification == true)
        <p class="h5  text-success">Your Email is Verified  
          <button type="submit" class="h5 btn btn-pink" style="text-decoration: none;"
          data-bs-toggle="modal" data-bs-target="#paypalEmailAssousiated">
             Change </button></p>
        @endif
        
       @endif
       
      
      </div>
    </div>
  </div>
</div></div>
  <!-- Modal -->
  <div class="modal fade" id="paypalEmailAssousiated" tabindex="-1" role="dialog" aria-labelledby="paypalEmailAssousiatedLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="paypalEmailAssousiatedLabel">Enter Your PayPal Email</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

          </button>
        </div>
        <div class="modal-body">
        <form action="{{ route('email.save') }}" method="post">
            @csrf
          <input name="paymentEmailVerification" type="email" class="form-control" 
          placeholder="Enter your PayPal email address">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          
          <button type="submit" class="btn btn-pink">Save changes</button>
          
        </div></form>
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
      <th class="h6 fw-bold">Requested Date</th>
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



<br><br><br><br><br>

@endsection 
