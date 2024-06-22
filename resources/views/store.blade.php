@extends('layouts.app')
@section('meta')
<title>Get Exclusive Cashback, Deals, Coupons & Discounts at Macklara</title>
<meta name="description" content="Discover the best cashback offers, unbeatable deals, exclusive coupons, and amazing discounts at Macklara. Shop smart and save big on your favorite brands with our money-saving opportunities. Start saving today!">
@endsection 
@section('content') 

<div class="container">
<search id="app1" class="py-3"></search>  
</div>

<div class="container">
    @foreach($store as $st)
        <div class="card my-2 shadow border-light rounded-3">
            <div class="row">
                <div class="col-4">
                    <img src="{{ asset('images/36.jpg') }}" class="img-fluid rounded-start" alt="..." loading="lazy">
                </div>
                <div class="col-8 my-2">
                    <p class="h2 d-inline">{{$st->name }}</p>
                    @auth
    <!-- For authenticated users -->
    <form method="POST" action="{{ route('favorites.toggleFavorite', ['companyId' => $st->id]) }}" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-link p-0 m-0 mb-2 ms-2" 
                style="background-color: transparent; border: none; cursor: pointer; outline: none; box-shadow: none;">
            @php 
                $isFavorite = $favorites->contains('company_id', $st->id);
            @endphp 
            @if($isFavorite)  
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill m-0 p-0" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                </svg> 
            @else 
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart m-0 p-0" viewBox="0 0 16 16">
                    <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                </svg> 
            @endif
        </button>
    </form>
@else
    <!-- For non-authenticated users -->
    <form method="POST" action="{{ route('favorites.toggleFavorite', ['companyId' => $st->id]) }}" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-link p-0 m-0 mb-2 ms-2" 
                style="background-color: transparent; border: none; cursor: pointer; outline: none; box-shadow: none;"
                onclick="event.preventDefault(); document.getElementById('login-form').submit();">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart m-0 p-0" viewBox="0 0 16 16">
                <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
            </svg> 
        </button>
    </form>
    <form id="login-form" action="{{ route('login') }}" method="GET" style="display: none;">
        @csrf
    </form>
@endauth


                        @if($st->sub_category == 1)
                        @php
                            $maxSubRate = $st->subCategories->max('sub_rate');
                        @endphp
                        <p class="h5 text-custom-color fw-bold">Up to:{{ formatCashback($maxSubRate) }}{{ __('%') }}</p>
                        @elseif($st->fix_amount !== null && $st->fix_amount !== 0)
                        <p class="h5 text-custom-colors fw-bold">${{ formatCashback($st->fix_amount) }}</p>
                        @else
                            <p class="h5 text-custom-color fw-bold">{{ formatCashback($st->rate) }}{{ __('%') }}</p>
                        @endif
                    <a href="{{ url('stores', ['id' => $st->id]) }}"
                       class="btn btn-custom-color rounded-1 store-link" 
                       target="_blank" 
                       rel="noopener noreferrer">Shop Now</a>
                    <br>
                    <a href="#" class="terms-link" data-bs-toggle="modal" data-bs-target="#termsModal">
                        Terms & Exclusions
                    </a> 
                  

                </div>
            </div>
        </div>
    @endforeach
    </div>
    <div class="container">
            @if($st->sub_category == 1)
             <div class="content-justify-center">
             <h2 class="mt-4  ">CashBack Categories</h2>
                <div  class="card shadow border-light rounded-3 " >
                    <div class="card-body">
                               <p class="h5 text-success fw-bold">
                                  @foreach($st->subCategories as $subCategory)
                                   <a href=""
                                      class="btn btn-outline-custom-color rounded-pill mt-2">
                                      <span class="text-dark h5 me-2">{{ $subCategory->sub_name }} </span>
                                      <span class="text-success fw-bold"> {{ formatCashback($subCategory->sub_rate) }}{{ __('%') }}</span>
                                    </a>
                                   @endforeach  
                                </p>
                    </div> 
                </div> 
                @endif 
            </div>
    </div>
</div>
<div class="container">
    @php $couponsForStore = $coupons->where('company_id', $st->id); @endphp

    @if($couponsForStore->isNotEmpty())
        <h2 class="mt-4 ms-1">Coupons</h2>
    @endif
    @foreach($couponsForStore as $coupon) 
        <div class="mt-2">
        @if($coupon->company)
        <div class="card  mb-1 shadow border-light rounded-3 " >
        <div class="  row m-0 py-2">
            <a href="{{ url('coupons', ['id' => $coupon->id]) }}" class="col-2 m-0 p-0"target="_blank">
            <img loading="auto" src="{{ asset('images/company/1.jpg') }}" class="card-img-top rounded-4"  alt="..." >
            </a>
            <div class="col-8 d-flex align-items-center"> 
            <div>
                <p class="h4 fw-bold  ms-1 mb-2">{{$coupon->c_title}}</p>
                @if($coupon->company->rate == null && $coupon->company->fix_amount == null)
                <p class="h5 text-custom-color   mb-0 pb-0">+ cashback Coming soon </p>
                @elseif($coupon->company->fix_amount !== null)
                <p class="h5  text-custom-color  mb-0 pb-0">+  ${{formatCashback($coupon->company->fix_amount)}} cashback</p>
                @else
                <p class="h5  text-custom-color  mb-0 pb-0">+ {{formatCashback($coupon->company->rate)}}% cashback</p>
                @endif
                </div>
            </div>
            <div class="col-2 m-0 p-0 d-flex align-items-center justify-content-center">
                <a class="fw-bold btn btn-outline-custom-color btn-md m-0 py-2 px-3 rounded-pill text-center" 
                href="{{ url('coupons', ['id' => $coupon->id]) }}"  target="_blank">Shop</a>
            </div>
        </div>
        </div>
        @endif 
        </div>
        @endforeach
</div>
<div class="container" style="min-height:15rem;">

</div>
<script>

</script>

@include('account.modal.terms-modal') 
@include('layouts.footer')
@endsection 
