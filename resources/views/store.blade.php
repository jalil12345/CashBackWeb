@extends('layouts.app')
@section('meta')
<title>Get Exclusive Cashback, Deals, Coupons & Discounts at Macklara</title>
<meta name="description" content="Discover the best cashback offers, unbeatable deals, exclusive coupons, and amazing discounts at Macklara. Shop smart and save big on your favorite brands with our money-saving opportunities. Start saving today!">
@endsection 
@section('content') 

<div class="container">
<search id="app1" class="pb-2"></search>  
</div>
<div class="container">
    @foreach($store as $st)
        <div class="card my-2 shadow border-light rounded-3">
            <div class="row">
                <div class="col-3 d-flex justify-content-center align-items-center position-relative">
                    <img src="{{ asset('images/36.jpg') }}" class="img-fluid rounded-start  "style="max-height: 10rem;" alt="..." loading="lazy">
                    @auth
                        <form method="POST" action="{{ route('favorites.toggleFavorite', ['companyId' => $st->id]) }}" class="position-absolute top-0 start-0 p-2 ms-3">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0" style="background-color: transparent; border: none; "onfocus="this.blur();">
                                @php 
                                    $isFavorite = $favorites->contains('company_id', $st->id); 
                                @endphp 
                                @if($isFavorite)  
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                                    </svg> 
                                @else 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                        <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                                    </svg> 
                                @endif
                            </button>
                        </form>
                    @else
                        <form method="POST" action="{{ route('favorites.toggleFavorite', ['companyId' => $st->id]) }}" class="position-absolute top-0 end-0 p-2" onclick="event.preventDefault(); document.getElementById('login-form').submit();">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0" style="background-color: transparent; border: none;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                    <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                                </svg> 
                            </button>
                        </form>
                        <form id="login-form" action="{{ route('login') }}" method="GET" style="display: none;">
                            @csrf
                        </form>
                    @endauth
                </div>
                <div class="col-9 my-2">
                    <h1 class="h1 d-inline">{{$st->name }}</h1>
                    @if($st->sub_category == 1)
                        @php
                            $maxSubRate = $st->subCategories->max('sub_rate');
                        @endphp
                        <p class="h5 text-custom-color fw-bold">Up to:{{ formatCashback($maxSubRate) }}{{ __('%') }}</p>
                    @elseif($st->fix_amount !== null && $st->fix_amount != 0.0)
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
                    <span class="mx-1"> </span> 
                    <a href="{{url('/add-coupon')}}" >
                        Add a Coupon
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
@php 
    $couponsForStore = $coupons->where('company_id', $st->id); 
    $currentDate = date('Y-m-d');
    $verifiedCoupons = $couponsForStore->where('c_status', true)->where('expire', '>=', $currentDate);
    $unverifiedCoupons = $couponsForStore->where('c_status', false)->where('expire', '>=', $currentDate);
    $expiredCoupons = $couponsForStore->where('expire','<', $currentDate);
@endphp

@if($verifiedCoupons->isNotEmpty())
    <h2 class="mt-4 ms-1 fw-bold">Coupons</h2>
    <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-2 row-cols-xlg-2">
        @foreach($verifiedCoupons as $coupon) 
            <div class="mt-2">
                @if($coupon->company)
                    <div class="card mb-1 shadow border-light rounded-3" style="max-width: 55rem;">
                        <div class="row m-0 py-2">
                            <div class="col-9 d-flex align-items-center"> 
                                <div>
                                    <h3 class="h3  ms-2 mb-2">{{$coupon->c_title}}</h3>
                                    @if($coupon->company_id == null)
                                        <!-- Do not display anything if company_id is null -->
                                    @else
                                        @if($coupon->company->rate == null && $coupon->company->fix_amount == null)
                                            <p class="text-custom-color ms-2 mb-0 pb-0">+ cashback Coming soon</p>
                                        @elseif($coupon->company->fix_amount !== null)
                                            <p class="text-custom-color ms-2 mb-0 pb-0">+ ${{formatCashback($coupon->company->fix_amount)}} cashback</p>
                                        @else
                                            <p class="text-custom-color ms-2 mb-0 pb-0">+ {{formatCashback($coupon->company->rate)}}% cashback</p>
                                        @endif
                                    @endif
                                </div>
                            </div>
                            <div class="col-3 m-0 p-0 d-flex align-items-center justify-content-center">
                                <a class="fw-bold btn btn-outline-custom-color btn-md m-0 py-2 px-3 rounded-pill text-center" 
                                    href="{{ url('coupons', ['id' => $coupon->id]) }}" target="_blank">Shop</a>
                            </div>
                        </div>
                    </div>
                @endif 
            </div>
        @endforeach
    </div>
@endif

@if($unverifiedCoupons->isNotEmpty())
    <h2 class="mt-4 ms-1 fw-bold">Unverified Coupons</h2>
    <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-2 row-cols-xlg-2">
        @foreach($unverifiedCoupons as $coupon) 
            <div class="mt-2">
                @if($coupon->company)
                    <div class="card mb-1 shadow border-light rounded-3" style="max-width: 55rem;">
                        <div class="row m-0 py-2">
                            <div class="col-9 d-flex align-items-center"> 
                                <div>
                                    <h3 class="h3  ms-2 mb-2">{{$coupon->c_title}}</h3>
                                    @if($coupon->company_id == null)
                                        <!-- Do not display anything if company_id is null -->
                                    @else
                                        @if($coupon->company->rate == null && $coupon->company->fix_amount == null)
                                            <p class="text-custom-color ms-2 mb-0 pb-0">+ cashback Coming soon</p>
                                        @elseif($coupon->company->fix_amount !== null)
                                            <p class="text-custom-color ms-2 mb-0 pb-0">+ ${{formatCashback($coupon->company->fix_amount)}} cashback</p>
                                        @else
                                            <p class="text-custom-color ms-2 mb-0 pb-0">+ {{formatCashback($coupon->company->rate)}}% cashback</p>
                                        @endif
                                    @endif
                                </div>
                            </div>
                            <div class="col-3 m-0 p-0 d-flex align-items-center justify-content-center">
                                <a class="fw-bold btn btn-outline-custom-color btn-md m-0 py-2 px-3 rounded-pill text-center" 
                                    href="{{ url('coupons', ['id' => $coupon->id]) }}" target="_blank">Shop</a>
                            </div>
                        </div>
                    </div>
                @endif 
            </div>
        @endforeach
    </div>
@endif

@if($expiredCoupons->isNotEmpty())
    <h2 class="mt-4 ms-1 fw-bold">Expired Coupons</h2>
    <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-2 row-cols-xlg-2">
        @foreach($expiredCoupons as $coupon) 
            <div class="mt-2">
                @if($coupon->company)
                    <div class="card mb-1 shadow border-light rounded-3" style="max-width: 55rem;">
                        <div class="row m-0 py-2">
                            <div class="col-9 d-flex align-items-center"> 
                                <div>
                                    <h3 class="h3  ms-2 mb-2">{{$coupon->c_title}}</h3>
                                    @if($coupon->company_id == null)
                                        <!-- Do not display anything if company_id is null -->
                                    @else
                                        @if($coupon->company->rate == null && $coupon->company->fix_amount == null && $coupon->company->fix_amount == 0)
                                            <p class="text-custom-color ms-2 mb-0 pb-0">+ cashback Coming soon</p>
                                        @elseif($coupon->company->fix_amount !== null && $coupon->company->fix_amount !== 0.0) 
                                            <p class="text-custom-color ms-2 mb-0 pb-0">+ ${{formatCashback($coupon->company->fix_amount)}} cashback</p>
                                        @else
                                            <p class="text-custom-color ms-2 mb-0 pb-0">+ {{formatCashback($coupon->company->rate)}}% cashback</p>
                                        @endif
                                    @endif
                                </div>
                            </div>
                            <div class="col-3 m-0 p-0 d-flex align-items-center justify-content-center">
                                
                            </div>
                        </div>
                    </div>
                @endif 
            </div>
        @endforeach
    </div>
@endif


</div>
<div class="container" style="min-height:15rem;">

</div>
<script>

</script>

@include('account.modal.terms-modal') 
@include('layouts.footer')
@endsection 
