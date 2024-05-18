@section('footer')
<div class="container-fluid bg-secondary"id="footer">
    <nav class="navbar navbar-light bg-secondary">
        <span class="navbar-brand text-white">Macklara</span>
        <!-- Social Media Icons -->
        <div class="social-icons">
            <a href="https://www.facebook.com/people/Macklara/100092340160430/"><i class="fab fa-facebook-f  fa-2x me-3"></i></a>
            <a href="https://www.instagram.com/macklara_official/"><i class="fab fa-instagram fa-2x me-3"></i></a>
            <!-- <a href="#"><i class="fab fa-twitter fa-2x me-3"></i></a> -->
            <!-- Add more social media icons as needed -->
        </div>
    </nav>
    <p class="text-white h5 text-center">Disclaimer</p>
    <p class="text-center text-white">
        When you use our links we will earn a commission and give you CashBack.
    </p>
    <div class="bg-secondary h6 text-center">
        <p>
            <a class="h5 text-white px-1" href="{{ url('contact-us') }}" style="text-decoration: none;"> Contact Us </a>
            <span class="h5">||</span>
            <a class="h5 text-white px-1" href="{{ url('about-us') }}" style="text-decoration: none;"> About Us </a>
            <span class="h5">||</span>
            <a class="h5 text-white px-1" href="{{ url('privacy-policy') }}" style="text-decoration: none;">{{ __('Privacy Policy  ') }}</a>
            <span class="h5">||</span>
            <a class="h5 text-white px-1" href="{{ url('terms-conditions') }}" style="text-decoration: none;">{{ __('Terms & Conditions') }}</a>
            <span class="h5">||</span>
            <a class="h5 text-white px-1" href="{{ url('how-it-works') }}" style="text-decoration: none;">{{ __('How it works !') }}</a>
            <span class="h5">||</span>
            <a class="h5 text-white px-1" href="{{ url('how-it-works') }}" style="text-decoration: none;"> FAQs </a>
        </p>
    </div><br>
    <div class="ml-4 text-center text-sm text-light sm:text-right sm:ml-0">
        All rights reserved to Macklara 2024 &copy;
    </div><br>
</div>
@endsection
