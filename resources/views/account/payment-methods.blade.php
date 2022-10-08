@extends('layouts.app')

@section('content')
<br>
<div class="container  h2">{{ __('Payouts') }}</div>

<div class="container "> <div class="card ">
  <div class="row ">
  
  <div class="col "><br><p class=" h6 ms-2 ">{{ __(' Pending Balance : ') }}{{ Auth::user()->name }}</p><hr>
                      <p class=" h6 ms-2 ">{{ __(' Verified Balance : ') }}{{ Auth::user()->name }}</p><hr>
                      <p class=" h6 ms-2 ">{{ __(' Payabale Balance : ') }}{{ Auth::user()->name }}</p><hr>
                      <p class=" h5 fw-bold ms-2 text-custom-pink">{{ __('Total Balance : ') }}{{ Auth::user()->name }}</p><br>
</div>

</div>
</div></div>

<br>
<div class="container  h2">{{ __('Payouts Methods') }}</div>



<div class="container "><div class="card">
<table class="table">
  <tbody>
    <tr class="my-4 h5">
      <td>{{ __(' Pending  : ') }}{{ Auth::user()->name }}</td>
      <td>{{ __(' Pending  : ') }}{{ Auth::user()->name }}</td>
      <td>{{ __(' Pending  : ') }}{{ Auth::user()->name }}</td>
      <td>{{ __(' Pending  : ') }}{{ Auth::user()->name }}</td>
    </tr>
    <tr class="my-4 h5">
      <td>{{ __(' Payabale  : ') }}{{ Auth::user()->name }}</td>
      <td>{{ __(' Payabale  : ') }}{{ Auth::user()->name }}</td>
      <td>{{ __(' Payabale  : ') }}{{ Auth::user()->name }}</td>
      <td>{{ __(' Payabale  : ') }}{{ Auth::user()->name }}</td>
    </tr>
    <tr class="my-4 h5">
      <th >{{ __('Total  : ') }}{{ Auth::user()->name }}</th>
      <th >{{ __('Total  : ') }}{{ Auth::user()->name }}</th>
      <th >{{ __('Total  : ') }}{{ Auth::user()->name }}</th>
      <th >{{ __('Total  : ') }}{{ Auth::user()->name }}</th>
    </tr>
    </tbody>
</table>
</div></div>

<div class="container  h2">{{ __('Payouts History') }}</div>

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
