@extends('layouts.app')
@section('meta')
<title>Get Exclusive Cashback, Deals, Coupons & Discounts at Macklara</title>
<meta name="description" content="Discover the best cashback offers, unbeatable deals, exclusive coupons, and amazing discounts at Macklara. Shop smart and save big on your favorite brands with our money-saving opportunities. Start saving today!">
@endsection 
@section('content')

<br><br><br><br>
<!-- <img src="" alt=""> -->
<br><br>
<div class=" align-items-center justify-content-center ">
    <div class="text-center">
        <h1>{{ $company->name }} Cash Back Activated</h1>
        <a href="#" class="h5">See Terms & Exclusions</a>
        <p>{{ $trip_id }}</p>
    </div>
</div>


<script>
    setTimeout(function(){
        window.location.href = "{{ $company->url }}";
    }, 5000);
</script>

@endsection 
