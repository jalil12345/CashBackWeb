
@section('footer')
<div class="container-fluid bg-secondary">
     <nav class="navbar  navbar-light bg-secondary ">
    
    <span class="navbar-brand text-white">Macklara</span></nav>
    <p class="">
      <p class="h5 text-center text-white">Disclaimer</p>
    <p class="text-center text-white">
       When you use our links we will earn a comission and give you 95% of it.</p> </p>
    <div class="bg-secondary h6 text-center " ><p class="">

      <a class="h5 text-white px-1" href="{{ url('contact-us') }}" style="text-decoration: none;"> Contact Us  </a> <span class="h5">||</span>
      <a class="h5 text-white px-1" href="{{ url('about-us') }}" style="text-decoration: none;"> About Us  </a> <span class="h5">||</span>
      <a class="h5 text-white px-1" href="{{ url('privacy-policy') }}" style="text-decoration: none;">{{ __('Privacy Policy  ') }}</a><span class="h5">||</span>
      <a class="h5 text-white px-1" href="{{ url('terms-conditions') }}" style="text-decoration: none;">{{ __('Terms & Conditions') }}</a><span class="h5">||</span>
      <a class="h5 text-white px-1" href="{{ url('how-it-works') }}" style="text-decoration: none;">{{ __('How it works !') }}</a><span class="h5">||</span>
      <a class="h5 text-white px-1" href="{{ url('how-it-works') }}" style="text-decoration: none;"> FAQs </a>
      
      
           </p>
    </div><br>
    
    <div class="ml-4 text-center text-sm text-light sm:text-right sm:ml-0">
                        All right reserve to Macklara 2024 &copy 
                    </div><br>
    </div>
@endsection 