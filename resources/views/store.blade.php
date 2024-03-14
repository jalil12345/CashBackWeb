@extends('layouts.app')
@section('meta')
<title>Get Exclusive Cashback, Deals, Coupons & Discounts at Macklara</title>
<meta name="description" content="Discover the best cashback offers, unbeatable deals, exclusive coupons, and amazing discounts at Macklara. Shop smart and save big on your favorite brands with our money-saving opportunities. Start saving today!">
@endsection 
@section('content')

   
<div class="container">
    @foreach($store as $st)
               

                <div class="card my-2 shadow border-light rounded-3">
                    <div class="row ">
                    <div class="col-4">
                        <img src="{{ asset('images/36.jpg') }}" class="img-fluid rounded-start" alt="..." loading="lazy">
                        
                    </div>
                        <div class="col-8 my-2">
                        <p class="h2">{{$st->name }}</p>
                        <a href="#" onclick="handleFavoriteClick({{ $st->id }});" 
                            class="">
                            <svg id="heart-icon"class="bi" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" 
                                 viewBox="0 0 16 16">
                                <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.920 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                            </svg>
                        </a>
                        <p class="h5 text-success fw-bold">{{ $st->rate }}{{ __('%') }}</p>
                        <!-- <a href="{{ $st->url }}{{ $st->companies_click_id }}" class="btn btn-custom-color rounded-1">Shop Now</a> -->
                        <a href="{{ $st->url }}{{ $st->companies_click_id }}" 
                           class="btn btn-custom-color rounded-1 store-link" 
                           data-store="{{ $st->name }}" 
                           data-cashback="{{ $st->rate }}"
                           data-redirect="{{ $st->url }}{{ $st->companies_click_id }}"
                           target="_blank" 
                           rel="noopener noreferrer">Shop Now</a>
                           <br>
                           <a href="#" class="terms-link" data-bs-toggle="modal" data-bs-target="#termsModal">
                            Terms & Exclusions</a>
                        </div>
                        
                        <a href="{{ url('stores', ['id' => $st->id]) }}"
                           target="_blank">click</a>
                        </div></div>
              
              <div class="card my-2 shadow border-light rounded-3">
                    
                        <p class="h2 ms-1 text-center">{{$st->name }} Terms & Exclusions</p>
                     
                        
                        
                </div>
                @endforeach
              @foreach($store as $ste)
                
                <div class="card my-2 shadow border-light rounded-3">
                    <div class="row">
                    <div class="col-4 my-1">
                        <p class="h2 ms-1">{{$ste->name }}</p>
                    </div>  
                    <div class="col-8 my-2">  
                        <p class="h5">{{ $ste->id }}</p>
                        <a href="#" class="btn btn-custom-pink rounded-1">Get Coupon</a>
                    </div>
                    </div>
                        
                </div>
              @endforeach
        

<br><br><br><br><br><br>
</div>
<script>
    window.onload = function () {
      updateHeartIcon({{ $st->id }});
   };
            function handleFavoriteClick(companyId) {
            event.preventDefault();
            toggleFavorite(companyId);
            updateHeartIcon(companyId);
        }
        function toggleFavorite(companyId) {
            axios.post(`/favorites/toggleFavorite/${companyId}`)
                .then(response => {
                    // Handle the response as needed
                    console.log(response.data);
                })
                .catch(error => {
                    // Handle the error if needed
                    console.error(error);
                });
        }
        function updateHeartIcon(companyId) {
        // Fetch updated favorites and check if the company is in favorites
        axios.get(`/api-favorites?search=${companyId}`)
            .then(favoritesResponse => {
                const favoriteCompanies = favoritesResponse.data;
                // Update the heart icon based on whether it's in favorites
                const heartIcon = document.querySelector('#heart-icon');
            
                console.log(heartIcon);
                if (favoriteCompanies.length > 0) {
                    heartIcon.innerHTML = '<path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>';
                    heartIcon.classList.add('bi-heart-fill');
                    heartIcon.classList.remove('bi-heart');
                } else {
                    heartIcon.innerHTML = '<path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>';
                    heartIcon.classList.remove('bi-heart-fill');
                    heartIcon.classList.add('bi-heart');
                }

                
            })
            .catch(favoritesError => {
                // Handle error fetching favorites if needed
                console.error(favoritesError);
            });
        }
    </script>

@include('account.modal.terms-modal') 
@include('layouts.footer')
@endsection 
