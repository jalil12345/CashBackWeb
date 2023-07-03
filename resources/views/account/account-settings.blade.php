@extends('layouts.app')

@section('content')
<br>

    <div class="container ">
    @if (session('warning'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ session('warning') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif 
    </div>

    <div class="container">
    <div class="card ">
    <div class="card-body">
    <h3 class="card-title fw-bold">Account Details</h3>
    <br>

    <div class="card">
  <div class="card-body">
    <h5 class="card-title">User Name</h5>
    <div class="card-text">
      <span id="">{{ Auth::user()->name }}</span>
      <a 
      href="#"
      class="float-end text-success" 
      style="text-decoration: none;"
      data-bs-toggle="modal"
      data-bs-target="#userName"
      >Change User Name
    </a>
    </div>
  </div>
</div>
   
  <br>

<div class="card">
  <div class="card-body">
    <h5 class="card-title">Email</h5>
    <div class="card-text">
      <span id="">{{ Auth::user()->email }}</span>
      @if($user->email_verified_at !== NULL)
      <a 
      href="#"
      class="float-end text-success" 
      style="text-decoration: none;"
      data-bs-toggle="modal"
      data-bs-target="#emailAddress"
      >Change Email
    </a>
    @elseif($user->email_verified_at == NULL)
    <a 
    href="#"
    class="float-end text-success" 
    style="text-decoration: none;"
    data-bs-toggle="modal"
    data-bs-target="#sendEmailAddress">
    Send Email Verification
    </a>
    @endif
    </div>
  </div>
</div>
<br>
<div class="container">
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
</div>

<div class="card">
  <div class="card-body">
    <h5 class="card-title">Password</h5>
    <div class="card-text">
      <span id="">********</span>
      <a 
      href="#"
      class="float-end text-success" 
      style="text-decoration: none;"
      data-bs-toggle="modal"
      data-bs-target="#accountPassword"
      >Add  Password
    </a>
    </div>
  </div>
</div>

<br>

<div class="card">
  <div class="card-body">
    <h5 class="card-title">Phone Number</h5>
    <div class="card-text">
      <span id="">{{ Auth::user()->phone_number }}</span>
      <a 
      href="#"
      class="float-end text-success" 
      style="text-decoration: none;"
      data-bs-toggle="modal"
      data-bs-target="#phoneNumber"
      >Change  Phone Number
    </a>
    </div>
  </div>
</div>
@include('account.modal.account-password-modal')     
@include('account.modal.user-name-modal')
@include('account.modal.email-address-modal')   
@include('account.modal.phone-number-modal') 
@include('account.modal.email-send-modal') 
    </div>
    <br>
    <div class="container">
  
      <a class="  h5 btn btn-pink rounded-5 ms-3 " href="update-account">Change your informations</a>
    
  <br><br>
  <div class="alert alert-warning " role="alert">
  <p> if you click this button your account will be deleted </p>
  <button class="h5 btn btn-danger rounded-5 d-flex ">Delete your Account</button>
</div>


</div>
</div>

</div>
<br>

@endsection 
