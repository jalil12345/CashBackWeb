@extends('layouts.app')
@section('meta')
<title>Get Exclusive Cashback, Deals, Coupons & Discounts at Macklara</title>
<meta name="description" content="Discover the best cashback offers, unbeatable deals, exclusive coupons, and amazing discounts at Macklara. Shop smart and save big on your favorite brands with our money-saving opportunities. Start saving today!">
@endsection 
@section('content')
<br><br><br><br><br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-sm-8 col-12 col-lg-6 col-xl-6">
            <div class="card">
                <div class="text-center mt-3 h2">{{ __('Enter SMS Code') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('number.verified') }}">
                        @csrf
                        <div class="form-group row justify-content-center align-items-center">
                            <div class="col-md-8 col-sm-8 col-8 col-lg-8 col-xl-8">
                                <input id="smsCodeInput" type="text" class="form-control @error('sms_code') is-invalid @enderror" name="sms_code" required pattern="[0-9]*" maxlength="6" >
                                @error('sms_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4 col-sm-4 col-4 col-lg-4 col-xl-4">
                                <button type="submit" class="btn btn-custom-color">{{ __('Verify') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    <br><br><br><br><br><br><br><br><br>
    @include('layouts.footer')

    <script>
        // JavaScript to allow only numeric input
        document.getElementById("smsCodeInput").addEventListener("input", function() {
            this.value = this.value.replace(/[^\d]/g, "");
        });
    </script>
@endsection 



