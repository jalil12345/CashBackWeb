@extends('layouts.app')
@section('meta')
<title>Admin Add Coupons to Macklara</title>
<meta name="description" content="Discover the best cashback offers, unbeatable deals, exclusive coupons, and amazing discounts at Macklara. Shop smart and save big on your favorite brands with our money-saving opportunities. Start saving today!">
@endsection     
@section('content')
<div class="container my-3 ">
    <a href="{{ url('/2/cou') }}"  rel="noopener noreferrer" class="me-3">sub_Categories</a>
    <a href="{{ url('/1/cou') }}"  rel="noopener noreferrer" class="me-3">Companies</a>
    <a href="{{ url('/1/trips') }}"  rel="noopener noreferrer" class="me-3">ManageTrips</a>
    <a href="{{ url('/users') }}"  rel="noopener noreferrer" class="me-3">users</a>
</div>
<div class="container mt-5">
    <h1 class="text-center fw-bold">admin add coupon to Macklara.</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }} 
            </div>
        @endif
        @if (session('couponExist'))
        <div class="alert alert-success">
            {{ session('couponExist') }}
        </div>
        @endif
    <form method="POST" action="{{ route('admin.addcoupon') }}">
        @csrf
        <div id="app7" class="mb-3">
        <coupon-component></coupon-component>
        </div>
        <div class="mb-3">
            <label for="offerType" class="form-label">Select an Offer Type</label>
            <select class="form-select" id="offerType" name="offer_type" required>
                <option value="code">Online Code</option>
                <!-- <option value="in_store_coupon">In-Store Coupon</option>
                <option value="online_sale_tip">Online Sale or Tip</option> -->
            </select>
        </div> 
        <div class="mb-3">
            <label for="code" class="form-label" >Code</label>
            <input type="text" class="form-control" id="code" name="code"placeholder="add code here" required maxlength="20">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Coupon Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" 
            placeholder="Add the coupon description. example: 15% OFF Order $100+ when using this code" required maxlength="100"></textarea>
        </div>
        <div class="mb-3">
            <label for="expirationDate" class="form-label">Expiration Date (optional)</label>
            <input type="date" class="form-control" id="expirationDate" name="expiration_date" style="max-width:10rem;">
        </div>
        <button type="submit" class="btn btn-custom-color ">Add Coupon</button>
    </form>
</div>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        let today = new Date().toISOString().split('T')[0];
        document.getElementById('expirationDate').setAttribute('min', today);
    });
</script>
 @include('layouts.footer')
@endsection 
