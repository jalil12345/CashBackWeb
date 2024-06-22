
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
    <h1 class="text-center text-dark">H1</h1>
  
    <form method="GET">
        <div class=" dropdown dropdown input-group"
        >
          <input 
            id="user_name"
            type="text" 
            name="search"
            value="{{ request()->get('search') }}" 
            class="  dropdown form-control" 
            placeholder="Search..." 
            aria-label="Search" 
            autocomplete="off"
            data-bs-toggle="dropdown" 
            aria-expanded="false">
          <button class="btn btn-success" type="submit" id="button-addon2">Search</button>
        
    </form>
    
    

</div>
    <table class="table table-bordered data-table mt-4">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>1</th>
                <th>2</th>
                <th>3</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td >{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->id }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->email }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    </div></div>


@include('layouts.footer')
@endsection 
