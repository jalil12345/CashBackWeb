@extends('layouts.app')

@section('content')

<div class="container "> <div class="card ">
  <div class="row">
  <div class="col-6"><br><br><p class="text-center h1  ">{{ __('  ') }}{{ Auth::user()->name }}</p>
                     <p class="text-center h6 ">{{ __('  ') }}{{ Auth::user()->email }}</p><br>
       <p class="text-center">   <button class="btn btn-pink mb-1" type="button"> Details</button>
                    <button class="btn btn-pink mb-1" type="button">Payouts</button></p>
                    </div>
  <div class="col-6">
</div>
</div>
</div>
<br>


    <div class="card rounded-3">
      <div class="card-body">
      <h2 class="card-title">{{ __('Membership') }}</h2>
      <table class="table">
   <thead>
    <tr>
      <th class="h6 fw-bold">Plan</th>
      <th class="h6 fw-bold">Price</th>
      <th class="h6 fw-bold">Create Date</th>
      <th class="h6 fw-bold">End Date</th>
    </tr>
   </thead>
    <tr>
      <td>date</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>@mdo</td>
    </tr>
</table>
      </div>
    </div>
    

<br>

    
      <div class="card">
      <div class="card-body">
      <h2 class="card-title">{{ __('Trips') }}</h2>
   <table class="table">
   <thead>
    <tr>
      <th class="h6 fw-bold">Date</th>
      <th class="h6 fw-bold">Store</th>
      <th class="h6 fw-bold">Click Id</th>
      <th class="h6 fw-bold">Order Reported</th>
    </tr>
   </thead>
  
    <tr>
      <td>date</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>@mdo</td>
    </tr>
    
  
</table>
</div></div></div>



@endsection 
