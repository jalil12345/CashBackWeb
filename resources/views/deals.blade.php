@extends('layouts.app')
@section('meta')
<title>Get Exclusive Cashback, Deals, Coupons & Discounts at Macklara</title>
<meta name="description" content="Discover the best cashback offers, unbeatable deals, exclusive coupons, and amazing discounts at Macklara. Shop smart and save big on your favorite brands with our money-saving opportunities. Start saving today!">
@endsection 
@section('content')

<search id="app1" class="py-0"></search>
<br>
<div class="container g-4">
    <span class="h2 fw-bold">Find Best Deals</span>
</div><br>

<div class="container">
    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xlg-5">
        @foreach($deals as $deal)
        <div class="col"> 
            @if($deal->company)
                <div class="card mb-3 rounded-4 shadow border-light" style="max-width: 20rem;">
                    <div class="card-header bg-transparent">
                    {{ $deal->company->name}}{{(' : 6 hours ago') }}
                    </div>
                    <div class="card-body">
                        <a href="{{ url('deals/name',['id'=> $deal->id]) }}">
                            <img loading="auto" src="{{ asset('images/company/1.jpg') }}" class="card-img-top rounded-4" alt="...">
                        </a>
                    </div>
                    <div class="card-footer bg-transparent">
                        <strong class="h5 fw-bold">{{ $deal->deal_title }}</strong>
                        <br><strong class="h4 fw-bolder"> 5$ </strong>
                        <small class="text-secondary text-decoration-line-through">$10</small>
                        <small class=""> + free shipping</small>
                        <br> <strong class="h5 fw-bolder text-success">5% cash back </strong>
                        <!-- <br><a href="{{ url('deals', ['id' => $deal->id]) }}">
                            Link Text</a> -->
                    </div>
                </div>
            @endif
        </div>
    @endforeach

    </div>
</div>
@include('layouts.footer')
@endsection
