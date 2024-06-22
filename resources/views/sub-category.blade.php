@extends('layouts.app')
@section('meta')
<title>Get Exclusive Cashback, Deals, Coupons & Discounts at Macklara</title>
<meta name="description" content="Discover the best cashback offers, unbeatable deals, exclusive coupons, and amazing discounts at Macklara. Shop smart and save big on your favorite brands with our money-saving opportunities. Start saving today!">
@endsection 
@section('content')

<div class="container my-3 ">
    <a href="{{ url('/1/cou') }}" target="_blank" rel="noopener noreferrer" class="me-3">companies</a>
    <a href="{{ url('/3/cou') }}" target="_blank" rel="noopener noreferrer" class="me-3">Filter Trips</a>
</div>
<div class="container">
    <form action="{{ route('subCategory.index') }}" method="GET">
        <input type="text" name="search" placeholder="Search by name or id">
        <button type="submit">Search</button>
    </form>

    <div class="container">
        @if(!is_array($sub_category) && $sub_category->isEmpty())
            <p>No sub_category found.</p>
        @elseif(is_array($sub_category) && empty($sub_category))
            <p>No sub_category found.</p>
        @else
            @foreach($sub_category as $sub)
            <form action="{{ route('subCategory.update', $sub->id) }}" method="POST" class="d-inline ">
                @csrf
                @method('PUT')
                <h4 class="d-inline-block ml-2">
                    <input type="text" name="sub_name" value="{{ $sub->sub_name }}">
                </h4>

                <p class="d-inline-block ml-2">
                    <input type="text" name="sub_rate" value="{{ $sub->sub_rate }}">
                </p>
                <p class="d-inline-block ml-2">
                    <input type="text" name="company_id" value="{{ $sub->company_id }}">
                </p><br>
                <!-- Add buttons for CRUD operations -->
                <button type="submit" class="btn btn-primary mb-2">Update</button>
                </form>
                <form action="{{ route('subCategory.destroy', $sub->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger mb-2">Delete</button>
                </form><br>
            @endforeach
        @endif
    </div>
</div>
<!-- Add form for adding a new sub -->
<form action="{{ route('subCategory.store') }}" method="POST" class="container">
        @csrf
        <input type="text" name="sub_name" placeholder="sub_name">
        <input type="text" name="sub_rate" placeholder="sub_rate">
        <input type="text" name="company_id" placeholder="company_id">
        <button type="submit" class="btn btn-success mb-2">Add</button>
    </form>


<script>
    
</script>
@include('layouts.footer')
@endsection 
