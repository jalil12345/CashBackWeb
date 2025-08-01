@extends('layouts.app')
@section('meta')
<title>Get Exclusive Cashback, Deals, Coupons & Discounts at Macklara</title>
<meta name="description" content="Discover the best cashback offers, unbeatable deals, exclusive coupons, and amazing discounts at Macklara. Shop smart and save big on your favorite brands with our money-saving opportunities. Start saving today!">
@endsection 
@section('content')
<br>

    <div class="container ">
    @if (session('warning'))
    <div class="alert alert-warning alert-dismissible fade show mb-2  shadow" role="alert">
        {{ session('warning') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif 
    </div>
    <div class="container">
    @if (session('successEmailDeleteSend'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('successEmailDeleteSend') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    </div>

    <div class="container">
    <div class="card mb-2  shadow border-light rounded-3">
    <div class="card-body">
    <h3 class="card-title fw-bold mb-3">Account Settings</h3>
    <div class="container">
    @if(session('successUserName'))
    <div class="alert alert-success alert-dismissible fade show mb-2  shadow">
        {{ session('successUserName') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    </div>
    <div class="card mb-3 border-light shadow">
  <div class="card-body">
    <h5 class="card-title">User Name</h5>
    <div class="card-text">
      <span id="">{{ Auth::user()->name }}</span>
      <a 
      href="#"
      class="float-end text-custom-color" 
      style="text-decoration: none;"
      data-bs-toggle="modal"
      data-bs-target="#userName"
      >Change User Name
    </a>
    </div>
  </div>
</div>
@include('account.modal.user-name-modal')


<div class="container">
    @if(session('successEmailVerification'))
    <div class="alert alert-success alert-dismissible fade show mb-2  shadow">
        {{ session('successEmailVerification') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
</div>  

<div class="card mb-3 border-light shadow">
  <div class="card-body">
    <h5 class="card-title">Email</h5>
    <div class="card-text ">
      <span class="float-start pe-1" id="">{{ Auth::user()->email }}</span>
      @if($user->email_verified_at !== NULL)
      <a 
      href="#"
      class="float-start text-custom-color" 
      style="text-decoration: none;"
      data-bs-toggle="modal"
      data-bs-target="#emailAddress"
      >change
    </a>
    <div class="text-custom-color float-end">
        <span class=" me-0 h5">Verified</span>   
        <svg class="mb-1"xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </svg>
     </div>
    @elseif($user->email_verified_at == NULL)
    <form action="{{ route('email.send') }}" method="post">
            @csrf
    <button 
    class="float-end btn btn-custom-color" 
    style="text-decoration: none;"
    type="submit" >
    Send Email Verification
   </button>
    </form>
    @endif
    </div>
  </div>
</div>
<div class="container">
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show mb-2  shadow">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
</div>

<div class="card mb-3 border-light shadow">
  <div class="card-body">
    <h5 class="card-title">Password</h5>
    <div class="card-text">
      <span id="">********</span>
      @if($user->password == NULL)
      <a 
      href="#"
      class="float-end text-custom-color" 
      style="text-decoration: none;"
      data-bs-toggle="modal"
      data-bs-target="#accountPassword"
      >Add  Password
    </a>
    @elseif($user->password !== NULL)
    <a 
      href="#"
      class="float-end text-custom-color" 
      style="text-decoration: none;"
      data-bs-toggle="modal"
      data-bs-target="#accountPassword"
      >Change Password
    </a>
    @endif
    
    </div>
    @include('account.modal.account-password-modal')
    </div></div>
  
</div>


<div class="container ">
@if(session('successPhoneNumber'))
<div class="alert alert-success alert-dismissible fade show mb-2  shadow">
    {{ session('successPhoneNumber') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
</div>


<div class="card mb-3 border-light shadow">
  <div class="card-body">
    <h5 class="card-title">Phone Number</h5>
    <div class="card-text">
      <span id="" class="float-start me-2">{{ Auth::user()->phone_number }}</span>
      @if($user->phone_number === NULL || $user->phone_number === 0)
      <a 
      href="#"
      class="float-end text-custom-color" 
      style="text-decoration: none;"
      data-bs-toggle="modal"
      data-bs-target="#phoneNumber"
      >Add  Phone Number
    </a>
    @elseif($user->phone_number !== NULL || $user->phone_number !== 0)
    <a href="#"
       class="float-start text-custom-color"
       style="text-decoration: none;"
       data-bs-toggle="modal"
       data-bs-target="#phoneNumber"
        >change</a>
    <form action="{{ route('number.verify') }}" method="post">
            @csrf
      <button 
      class="float-end btn btn-custom-color" 
      style="text-decoration: none;"
      type="submit">
      Verify Phone Number
     </button>
     
    </form>
    @endif
    
    </div>
  </div>@include('account.modal.phone-number-modal')
  </div></div>


<div class="container">
    @if(session('paypalSuccessMessage'))
        <div class="alert alert-success alert-dismissible fade show mb-2 shadow">
            {{ session('paypalSuccessMessage') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
</div>


<div class="card mb-3 shadow border-light rounded-3">
  <div class="card-body">
      <div class="float-start">
        <img src="https://www.paypalobjects.com/webstatic/mktg/Logo/pp-logo-100px.png" alt="PayPal Logo">
      </div>
      <div class="float-end">
              @if($paypal_name != NULL)
                    <div class="text-custom-color">
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

<div class="card mb-3 shadow border-light rounded-3">
  <div class="card-body">
      <div class="float-start">
        <img src="Facebook_logo.png" alt="Facebook Logo" width="100" height="100">
      </div>
      <div class="float-end">
        <a href=""
          style="text-decoration: none;">
          Connect Facebook</a>
      </div>
  </div>
</div>

<div class="card mb-3 shadow border-light rounded-3">
  <div class="card-body">
      <div class="float-start">
        <img src="Microsoft_logo.png" alt="Microsoft Logo" width="100" height="100">
      </div>
      <div class="float-end">
        <a href=""
          style="text-decoration: none;">
          Connect Microsoft</a>
      </div>
  </div>
</div>


    </div>
    <div class="container">
    <div class="alert alert-warning" role="alert">
        <p>If you click this button your account will be deleted</p>
        <a href="{{ route('send-delete-token') }}" class="h5 btn btn-danger rounded-5 ">Delete your Account</a>
    </div>
   </div>



</div>

@include('account.modal.email-send-modal') 
@include('account.modal.email-address-modal')
<br>
@include('layouts.footer')
@endsection 
