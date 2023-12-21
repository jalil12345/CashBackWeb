@extends('layouts.app')

@section('content')

<div class="container "> 
  <div class="card mb-3 shadow border-light rounded-3">
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


    
      <div class="card shadow border-light rounded-3">
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
