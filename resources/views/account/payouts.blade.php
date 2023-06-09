@extends('layouts.app')

@section('content')
<br>
<div class="container  h3">{{ __('Balance') }}</div>

<div class="container "> <div class="card ">
  <div class="row ">
  
  <div class="col "><br><p class=" h6 ms-2 ">{{ __(' Pending Balance : ') }}{{ Auth::user()->name }}</p><hr>
                      <p class=" h6 ms-2 ">{{ __(' Verified Balance : ') }}{{ Auth::user()->name }}</p><hr>
                      <p class=" h6 ms-2 fw-bold text-success">{{ __(' Payabale Balance : ') }}{{ Auth::user()->name }}</p><hr>
                      <p class=" h5 fw-bold ms-2 text-custom-pink">{{ __('Total Balance : ') }}{{ Auth::user()->name }}</p><br>
</div>

</div>
</div></div>

<br>
<div class="container  ">
  <div class="h3 ">{{ __('Payout Request') }}</div>




<div class="card">
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
       <!-- @foreach($paymentMethods as $paymentMethod) -->
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
        @endforeach
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
            <!-- @if ($errors->any())
             <div class="alert alert-danger"> <ul>
            @foreach ($errors->all() as $error)
             <li>{{ $error }}</li>
            @endforeach
            </ul></div>
             @endif -->
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

<div class="container "><div class="card">
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
