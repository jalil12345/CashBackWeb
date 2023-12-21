 @extends('layouts.app')

@section('content')

 <search id="app1" class="py-0"></search>  



<div class="container">
  <br>
 
<strong class="h2  pe-2 fw-bolder "> Best Deals Today </strong> <a href="{{ url('deals') }}" class="h6">See All</a>
<br><br></div>
<div class="container ">
<div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xlg-5">
<div class="col "> 

  <div class="card  mb-3 rounded-4" style="max-width: 18rem;">
    <div class="card-header bg-transparent ">  <strong class="h6 fw-bold">Product name </strong>   </div>
    <div class="card-body">
    <a href="#">
  <img loading="auto" src="{{ asset('images/company/1.jpg') }}" class="card-img-top  rounded-4"  alt="..." 
  style=" max-width: 12rem; max-height:10rem;"></a>
  
    </div>
    <div class="card-footer bg-transparent "> 
      <strong class="h5 fw-bolder"> 5$  </strong>
      <small class="text-secondary text-decoration-line-through">$10</small> 
      + <small class="text-secondary">free shiping</small> <br>  <strong class="h6 fw-bolder text-success">+ 5% cashback </strong> 
    </div>
  </div></div>

  <div class="col "> 

  <div class="card  mb-3 rounded-4" style="max-width: 18rem;">
    <div class="card-header bg-transparent ">  <strong class="h6 fw-bold">Product name </strong>  </div>
    <div class="card-body">
    <a href="#">
  <img loading="auto" src="{{ asset('images/company/1.jpg') }}" class="card-img-top  rounded-4"  alt="..." 
  style=" max-width: 12rem; max-height:10rem;"></a>
  
    </div>
    <div class="card-footer bg-transparent "> 
      <strong class="h5 fw-bolder"> 5$  </strong>
      <small class="text-secondary text-decoration-line-through">$10</small> 
      + <small class="text-secondary">free shiping</small> <br>  <strong class="h6 fw-bolder text-success">+ 5% cashback </strong> 
    </div>
  </div></div>

  <div class="col "> 

<div class="card  mb-3 rounded-4" style="max-width: 18rem;">
  <div class="card-header bg-transparent ">  <strong class="h6 fw-bold">Product name </strong>   </div>
  <div class="card-body">
  <a href="#">
<img loading="auto" src="{{ asset('images/company/1.jpg') }}" class="card-img-top  rounded-4"  alt="..." 
style=" max-width: 12rem; max-height:10rem;"></a>

  </div>
  <div class="card-footer bg-transparent "> 
    <strong class="h5 fw-bolder"> 5$  </strong>
    <small class="text-secondary text-decoration-line-through">$10</small> 
    + <small class="text-secondary">free shiping</small> <br>  <strong class="h6 fw-bolder text-success">+ 5% cashback </strong> 
  </div>
</div></div>

<div class="col "> 

<div class="card  mb-3 rounded-4" style="max-width: 18rem;">
  <div class="card-header bg-transparent ">  <strong class="h6 fw-bold">Product name </strong>   </div>
  <div class="card-body">
  <a href="#">
<img loading="auto" src="{{ asset('images/company/1.jpg') }}" class="card-img-top  rounded-4"  alt="..." 
style=" max-width: 12rem; max-height:10rem;"></a>

  </div>
  <div class="card-footer bg-transparent "> 
    <strong class="h5 fw-bolder"> 5$  </strong>
    <small class="text-secondary text-decoration-line-through">$10</small> 
    + <small class="text-secondary">free shiping</small> <br>  <strong class="h6 fw-bolder text-success">+ 5% cashback </strong> 
  </div>
</div></div>


</div>



  <br>
<strong class="h2  pe-2 fw-bolder ">Stores </strong> <a href="{{ url('stores') }}" class="h6">See All</a>
<br></div>
<br>
<div class="container ">
<div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xlg-5">
  
<div class="col "> 
  <div class="card  mb-3 rounded-4" style="max-width: 18rem;">
    <div class="card-body">
    <a href="#">
    <img  loading="auto" src="{{ asset('images/company/1.jpg') }}" 
          class="card-img-top  rounded-4"  alt="..." 
          style=" max-width: 12rem; max-height:10rem;">
        </a>
  
    </div>
    <div class="card-footer bg-transparent text-center"> 
      <strong class="h5 fw-bolder text-success"> 5% cashback </strong> 
    </div>
  </div>
</div>

<div class="col "> 
  <div class="card  mb-3 rounded-4" style="max-width: 18rem;">
    <div class="card-body">
    <a href="#">
    <img  loading="auto" src="{{ asset('images/company/1.jpg') }}" 
          class="card-img-top  rounded-4"  alt="..." 
          style=" max-width: 12rem; max-height:10rem;">
        </a>
  
    </div>
    <div class="card-footer bg-transparent text-center"> 
      <strong class="h5 fw-bolder text-success"> 5% cashback </strong> 
    </div>
  </div>
</div>

<div class="col "> 
  <div class="card  mb-3 rounded-4" style="max-width: 18rem;">
    <div class="card-body">
    <a href="#">
    <img  loading="auto" src="{{ asset('images/company/1.jpg') }}" 
          class="card-img-top  rounded-4"  alt="..." 
          style=" max-width: 12rem; max-height:10rem;">
        </a>
  
    </div>
    <div class="card-footer bg-transparent text-center"> 
      <strong class="h5 fw-bolder text-success"> 5% cashback </strong> 
    </div>
  </div>
</div>

<div class="col "> 
  <div class="card  mb-3 rounded-4" style="max-width: 18rem;">
    <div class="card-body">
    <a href="#">
    <img  loading="auto" src="{{ asset('images/company/1.jpg') }}" 
          class="card-img-top  rounded-4"  alt="..." 
          style=" max-width: 12rem; max-height:10rem;">
        </a>
  
    </div>
    <div class="card-footer bg-transparent text-center"> 
      <strong class="h5 fw-bolder text-success"> 5% cashback </strong> 
    </div>
    </div>
  </div>
</div>



  <div class="d-flex align-items-center">
    <h2 class="mb-0 me-3 fw-bolder">Coupons</h2>
    <a href="{{ url('coupons') }}" class="h6 mb-0">See All</a>
</div>

<!-- <strong class="h2  pe-2 fw-bolder ">Coupons </strong> <a href="{{ url('coupons') }}" class="h6">See All</a> -->
<br> </div>
<div class="container ">
<div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xlg-5">
<div class="col "> 

  <div class="card  mb-3" style="max-width: 16rem;">
    <div class="card-header bg-transparent ">{{ __(' Walmart  :') }}     </div>
    <div class="card-body text-success">
      <h5 class="card-title">Success card title</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    </div>
    <div class="card-footer bg-transparent "><strong class="h5 fw-bold">Product name </strong> 
      <br><strong class="h4 fw-bolder"> 5$ 
      </strong><small class="text-secondary text-decoration-line-through">$10
      </small> <br><small class="text-secondary">free shiping</small>  <br> <strong class="h5 fw-bolder text-success">5% cash back </strong> 
    </div>
  </div></div>

  <div class="col "> 

<div class="card  mb-3" style="max-width: 16rem;">
  <div class="card-header bg-transparent ">{{ __(' Walmart  :') }}     </div>
  <div class="card-body text-success">
    <h5 class="card-title">Success card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
  <div class="card-footer bg-transparent ">Product name <br>$5 $10 <br> free shiping <br> 5% cash back 
  </div>
</div></div>

<div class="col "> 

  <div class="card  mb-3" style="max-width: 16rem;">
    <div class="card-header bg-transparent ">{{ __(' Walmart  :') }}     </div>
    <div class="card-body text-success">
      <h5 class="card-title">Success card title</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    </div>
    <div class="card-footer bg-transparent ">Product name <br>$5 $10 <br> free shiping <br> 5% cash back 
    </div>
  </div></div>

  <div class="col "> 

<div class="card  mb-3" style="max-width: 16rem;">
  <div class="card-header bg-transparent ">{{ __(' Walmart  :') }}     </div>
  <div class="card-body text-success">
    <h5 class="card-title">Success card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
  <div class="card-footer bg-transparent ">Product name <br>$5 $10 <br> free shiping <br> 5% cash back 
  </div>
</div></div></div>



      
@endsection 
