
@extends('layouts.app')
@section('meta')
<title>Manage Trips</title>
<meta name="description" content="Manage trips for users.">
@endsection
@section('content')

<div class="container my-3 ">
    <a href="{{ url('/2/cou') }}"  rel="noopener noreferrer" class="me-3">sub_Categories</a>
    <a href="{{ url('/1/cou') }}"  rel="noopener noreferrer" class="me-3">Companies</a>
    <a href="{{ url('/users') }}"  rel="noopener noreferrer" class="me-3">users</a>
    <a href="{{ url('/3/cou') }}"  rel="noopener noreferrer" class="me-3">trips</a>

</div>

<div class="container">
    <h1 class="text-center text-dark">Manage Trips</h1>

    <form action="{{ route('tripsAdmin.index') }}" method="GET">
        <input type="text" name="search" placeholder="Search by trip details or ID">
        <button type="submit">Search</button>
    </form>

    <div class="container mt-4">
        @if(!is_array($trips) && $trips->isEmpty())
            <p>No trips found.</p>
        @elseif(is_array($trips) && empty($trips))
            <p>No trips found.</p>
        @else
            @foreach($trips as $trip)
            <form action="{{ route('tripsAdmin.update', $trip->id) }}" method="POST" class="d-inline">
                @csrf
                @method('PUT')
                <p class="d-inline-block">
                    <input type="text" name="trip_id" 
                            value="{{ $trip->trip_id }}" style="width: 150px;">
                </p>
                <p class="d-inline-block ml-2">{{ $trip->id }}</p>
                <p class="d-inline-block ml-2">
                    <input type="text" name="user_id" value="{{ $trip->user_id }}" 
                           style="width: 150px;" >
                </p>
                <p class="d-inline-block ml-2">
                    <input type="text" name="p_name" value="{{ $trip->p_name }}" 
                           style="width: 150px;" >
                </p>
                <p class="d-inline-block ml-2">
                    <input type="text" name="p_store" value="{{ $trip->p_store }}" 
                           style="width: 150px;" >
                </p>
                <p class="d-inline-block ml-2">
                    <input type="text" name="p_price" value="{{ $trip->p_price }}" 
                           style="width: 150px;" >
                </p>
                <p class="d-inline-block ml-2">
                    <input type="text" name="trip_cashback" value="{{ $trip->trip_cashback }}" 
                           style="width: 150px;" >
                </p>
                <p class="d-inline-block ml-2">
                    <input type="text" name="trip_status" value="{{ $trip->trip_status }}" 
                           style="width: 150px;" >
                </p>
                
                <p class="d-inline-block ml-2">
                    <input type="text" name="pending" value="{{ $trip->pending  }}"
                           style="width : 40px;" > 
                </p>        
                <p class="d-inline-block ml-2">
                    <input type="text" name="verified" value="{{ $trip->verified  }}"
                           style="width : 40px;" >
                </p>
                <p class="d-inline-block ml-2">
                    <input type="text" name="payable" value="{{ $trip->payable  }}"
                           style="width : 40px;" >
                </p>
                <p class="d-inline-block ml-2">
                    <input type="text" name="paid_amount" value="{{ $trip->paid_amount }}" 
                           style="width: 150px;" >
                </p>
                <button type="submit" class="btn btn-primary mb-2">Update</button>
            </form>
            <form action="{{ route('tripsAdmin.destroy', $trip->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger mb-2">Delete</button>
            </form><br>
            @endforeach
        @endif
    </div>
</div>

    @include('layouts.footer')
@endsection 