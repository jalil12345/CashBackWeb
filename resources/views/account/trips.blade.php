@extends('layouts.app')

@section('meta')
    <title>Get Exclusive Cashback, Deals, Coupons & Discounts at Macklara</title>
    <meta name="description" content="Discover the best cashback offers, unbeatable deals, exclusive coupons, and amazing discounts at Macklara. Shop smart and save big on your favorite brands with our money-saving opportunities. Start saving today!">
@endsection 

@section('content')
<div class="container">
    <h1>Trips</h1>
    <div class="container shadow border-light rounded-3">
    @if ($trips->isEmpty())
        <p>You have no trips.</p>
    @else
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Store</th>
                        <th>Trip Number</th>
                        <th>Order Info</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($trips->reverse() as $trip)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($trip->created_at)->format('m/d/Y g:i A') }}</td>
                            <td>{{ $trip->p_store }}</td>
                            <td>{{ $trip->trip_id }}</td>
                            <td>{{ $trip->pending }}</td>
                        </tr>
                    @endforeach 
                </tbody>
            </table>
        </div>
        @endif
    </div>
</div>
<div class="container" style="min-height:30rem;">

</div>
@include('layouts.footer')
@endsection 
