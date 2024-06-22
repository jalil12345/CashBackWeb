@extends('layouts.app')

@section('meta')
    <title>Get Exclusive Cashback, Deals, Coupons & Discounts at Macklara</title>
    <meta name="description" content="Discover the best cashback offers, unbeatable deals, exclusive coupons, and amazing discounts at Macklara. Shop smart and save big on your favorite brands with our money-saving opportunities. Start saving today!">
@endsection 

@section('content')
<div class="container my-3 ">
    <a href="{{ url('/2/cou') }}"  rel="noopener noreferrer" class="me-3">sub_Categories</a>
    <a href="{{ url('/1/cou') }}"  rel="noopener noreferrer" class="me-3">Companies</a>
    <a href="{{ url('/1/trips') }}"  rel="noopener noreferrer" class="me-3">ManageTrips</a>
    <a href="{{ url('/users') }}"  rel="noopener noreferrer" class="me-3">users</a>
</div>
<div class="container">
    <h1>Trips</h1>
        <form action="{{ route('trips.filter') }}" method="GET"> <div class="mb-3">
            <label for="filterDate" class="form-label">Filter by Date:</label>
            <input type="date" class="form-control " id="filterDate" name="date"style="width : 350px;">
            </div>
            <button type="submit" class="btn btn-primary">Filter Trips</button>
       </form>
       @if (! $trips->isEmpty())
    <div class="text-center mt-3">
        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updateTripsModal">
            Update Status (Verified: 0, Payable: 1)
        </button>
    </div>

    <div class="modal fade" id="updateTripsModal" tabindex="-1" aria-labelledby="updateTripsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateTripsModalLabel">Update Trip Statuses</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to update the statuses of these filtered trips? (Verified: 0, Payable: 1)</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form action="{{ route('trips.verifiedToPayableAdmin') }}" method="POST">
                        @csrf
                        <input type="hidden" name="trips" value="{{ implode(',', $trips->pluck('id')->toArray()) }}">  
                        <button type="submit" class="btn btn-warning">Confirm Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif

    @php
       $totalCashback = $trips->sum('trip_cashback');
    @endphp
   <p class="text-success h5 fw-bold">Total Trips: {{ number_format($totalCashback, 2) }}</p>

    <div class="container shadow border-light rounded-3">
    @if ($trips->isEmpty())
        <p>You have no trips.</p>
    @else
    
    
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Time</th>
                        <th>Store</th>
                        <th>Trip Number</th>
                        <th>Order Info</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($trips->reverse() as $trip)
                    <?php $totalCashback = 0;?>
                    <?php $totalCashback += $trip->trip_cashback; ?>
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($trip->created_at)->format('m/d/Y g:i A') }}</td>
                            <td>{{ $trip->p_store }}</td>
                            <td>{{ $trip->trip_id }}</td>
                            <td>{{ $trip->trip_cashback }}</td>
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
