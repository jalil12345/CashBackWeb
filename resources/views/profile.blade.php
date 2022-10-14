@extends('layouts.app')

@section('content')

    <br>
    
  
  
<br>
<div class="container "> <div class="card ">
  <div class="row">
  <div class="col-6"><br><br><p class="text-center h1  ">{{ __('  ') }}{{ Auth::user()->name }}</p>
                     <p class="text-center h5 ">{{ __(' Email : ') }}{{ Auth::user()->email }}</p><br>
       <p class="text-center">   <button class="btn btn-custom-pink mb-1" type="button"> Details</button>
                    <button class="btn btn-custom-pink mb-1" type="button">Payouts</button></p>
                    </div>
  <div class="col-6"><br><p class=" h6 ms-2 ">{{ __(' Pending Balance : ') }}{{ Auth::user()->name }}</p><hr>
                      <p class=" h6 ms-2 ">{{ __(' Verified Balance : ') }}{{ Auth::user()->name }}</p><hr>
                      <p class=" h6 ms-2 ">{{ __(' Payabale Balance : ') }}{{ Auth::user()->name }}</p><hr>
                      <p class=" h5 fw-bold ms-2 text-custom-pink">{{ __('Total Balance : ') }}{{ Auth::user()->name }}</p><br>
</div>
</div>
</div></div>
<br>

<!-- <div class="collapse" id="collapseExample">
  <div class=" ">
    Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.
  </div>
  </div> -->

  
<div class="container text-center h1 text-custom-pink">{{ __('Payment Methods') }}</div>
    <br>
<div class="container ">
<div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 ">

  <div class="col ">
    <div class="card rounded-3">
      <img src="{{ asset('images/c.png') }}" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="{{ asset('images/c.png') }}" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="{{ asset('images/c.png') }}" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="{{ asset('images/c.png') }}" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
    </div>
  </div>
 </div>
</div>

<br>

<div class="container text-center h1">{{ __('Trips') }}</div>
    <br>
    <div class="container "><div class="card">
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
</div></div>



@endsection 
