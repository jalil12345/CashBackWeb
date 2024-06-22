@extends('layouts.app')
@section('meta')
<title>Get Exclusive Cashback, Deals, Coupons & Discounts at Macklara</title>
<meta name="description" content="Discover the best cashback offers, unbeatable deals, exclusive coupons, and amazing discounts at Macklara. Shop smart and save big on your favorite brands with our money-saving opportunities. Start saving today!">
@endsection 
@section('content')

 <div class="container my-3 ">
    <a href="{{ url('/2/cou') }}"  rel="noopener noreferrer" class="me-3">sub_Categories</a>
    <a href="{{ url('/3/cou') }}"  rel="noopener noreferrer" class="me-3">Filter Trips</a>
    <a href="{{ url('/1/trips') }}"  rel="noopener noreferrer" class="me-3">ManageTrips</a>
    <a href="{{ url('/3/cou') }}"  rel="noopener noreferrer" class="me-3">trips</a>
</div>

<div class="container">
    <form action="{{ route('searchAdmin.index') }}" method="GET">
        <input type="text" name="search" placeholder="Search by name or id">
        <button type="submit">Search</button>
    </form>

    

    <div class="container">
        @if(!is_array($companies) && $companies->isEmpty())
            <p>No companies found.</p>
        @elseif(is_array($companies) && empty($companies))
            <p>No companies found.</p>
        @else
            @foreach($companies as $company)
            <form action="{{ route('searchAdmin.update', $company->id) }}" method="POST" class="d-inline ">
                @csrf
                @method('PUT')
                <h4 class="d-inline-block"> 
                    <input type="text" name="name" value="{{ $company->name }}">
                </h4>
                <p class="d-inline-block ml-2">{{ $company->id }}</p>

                <p class="d-inline-block ml-2">
                    <input type="text" name="sub_category" value="{{ $company->sub_category }}">
                </p>
                <p class="d-inline-block ml-2">
                    <input type="text" name="url" value="{{ $company->url }}">
                </p>
                <p class="d-inline-block ml-2">
                    <input type="text" name="image" value="{{ $company->image }}">
                </p>
                <p class="d-inline-block ml-2">
                    <input type="text" name="rate" value="{{ $company->rate }}">
                </p>
                <p class="d-inline-block ml-2">
                    <input type="text" name="fix_amount" value="{{ $company->fix_amount }}">
                </p>
                <p class="d-inline-block ml-2">
                    <input type="text" name="category" value="{{ $company->category }}">
                </p><br>
                <!-- Add buttons for CRUD operations -->
                <button type="submit" class="btn btn-primary mb-2">Update</button>
                </form>
                <form action="{{ route('searchAdmin.destroy', $company->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger mb-2">Delete</button>
                </form><br>
            @endforeach
        @endif
    </div>
</div>
<!-- Add form for adding a new company -->
<form action="{{ route('searchAdmin.store') }}" method="POST" class="container">
        @csrf
        <input type="text" name="name" placeholder="Company Name str">
        <input type="text" name="sub_category" placeholder="Sub Category 0/1">
        <input type="text" name="url" placeholder="URL str https">
        <input type="text" name="image" placeholder="Image str"> 
        <input type="text" name="rate" placeholder="rate str"> 
        <input type="text" name="fix_amount" placeholder="fix decimal">
        <input type="text" name="category" placeholder="Category str"> 
        <input type="text" name="terms_exclutions" placeholder="Terms text">
        <button type="submit" class="btn btn-success mb-2">Add</button> 
    </form>


<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br>
<script>
    
</script>
@include('layouts.footer')
@endsection 
