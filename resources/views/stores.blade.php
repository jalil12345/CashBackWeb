@extends('layouts.app')
@section('meta')
<title>Get Exclusive Cashback, Deals, Coupons & Discounts at Macklara</title>
<meta name="description" content="Discover the best cashback offers, unbeatable deals, exclusive coupons, and amazing discounts at Macklara. Shop smart and save big on your favorite brands with our money-saving opportunities. Start saving today!">
@endsection 
@section('content')

<search id="app1" class="py-0"></search> 

<div class="container"id="body">

<div class="container" >
  <br>
<strong class="h2  pe-2 pb-3 fw-bolder ">All Stores List </strong>  <br><br>

    <store-search id="app0" ></store-search>


             <br>
  <div id="row"class="row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xlg-5">

   </div>
  </div>
</div>

@include('layouts.footer')
@endsection 
