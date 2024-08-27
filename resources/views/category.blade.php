@extends('layouts.app')
@section('meta')
<title>Get Exclusive Cashback, Deals, Coupons & Discounts at Macklara</title>
<meta name="description" content="Discover the best cashback offers, unbeatable deals, exclusive coupons, and amazing discounts at Macklara. Shop smart and save big on your favorite brands with our money-saving opportunities. Start saving today!">
@endsection 

@section('content')
<div class="container">
<search id="app1" class="py-3"></search>  
</div>
<div class="container mb-3">
    <h1 class="h1 mb-3">{{$store->first()->category }}</h1>
</div>

<div class="container">
    <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xlg-5">
        @foreach($store as $st)
            <div class="col">
                <div class="card mb-3 rounded-4 shadow border-light " style="max-width: 18rem;">
                    <div class="card-header bg-transparent">
                        <strong class="h6 fw-bold">{{$st->name}}</strong>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('stores/name', $st->name) }}">
                            <img loading="auto" src="{{ asset('images/company/1.jpg') }}" class="card-img-top rounded-4" alt="..." style=" max-width: 12rem; max-height:10rem;">
                        </a>
                    </div>
                    <div class="card-footer bg-transparent">
                    @if($st->sub_category == 1)
                        @php
                            $maxSubRate = $st->subCategories->max('sub_rate');
                        @endphp
                        <p class="h5 text-custom-color fw-bold">Up to:{{ formatCashback($maxSubRate) }}{{ __('%') }}</p>
                        @elseif($st->fix_amount !== null && $st->fix_amount !== 0)
                        <p class="h5 text-custom-color fw-bold">${{ formatCashback($st->fix_amount) }}</p>
                        @else
                            <p class="h5 text-custom-color fw-bold">{{ formatCashback($st->rate) }}{{ __('%') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@include('layouts.footer')
@endsection
