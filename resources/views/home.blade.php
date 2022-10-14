 @extends('layouts.app')

@section('content')
<!-- <div class="container ">
<div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="true" data-bs-interval="false">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ asset('images/c.png') }}" class="d-block w-120 " alt="...">
      
    </div>
    <div class="carousel-item">
      <img src="{{ asset('images/c.png') }}" class="d-block w-120" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('images/c.png') }}" class="d-block w-120" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</div> --> 


<!-- <div class="container  ">
    
    <div class="row ">
    <div class="col-8 " > 
    <div class="card" style="max-width: 100% ; height: auto ;">
    
    <img  src="{{ asset('images/66.png') }}" class="card-img-top" 
     alt="..." >
    
  </div></div>
    
                        
  </div><br><br><br>
      

</div> -->


<!-- <div class="container ">
    <div class="row justify-content-center ">
         <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div> 
    </div>
</div> -->



<br>
<br><br>


<div class="container">
  <br>
<strong class="h2  pe-2 fw-bolder "> Best Deals Today </strong> <a href="" class="h6">See All</a>
<br><br></div>
<div class="container ">
<div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xlg-5">
<div class="col "> 

  <div class="card  mb-3 rounded-4" style="max-width: 18rem;">
    <div class="card-header bg-transparent ">  <strong class="h6 fw-bold">Product name </strong>   </div>
    <div class="card-body">
    <a href="#">
  <img  src="{{ asset('images/company/1.jpg') }}" class="card-img-top  rounded-4"  alt="..." 
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
  <img  src="{{ asset('images/company/1.jpg') }}" class="card-img-top  rounded-4"  alt="..." 
  style=" max-width: 12rem; max-height:10rem;"></a>
  
    </div>
    <div class="card-footer bg-transparent "> 
      <strong class="h5 fw-bolder"> 5$  </strong>
      <small class="text-secondary text-decoration-line-through">$10</small> 
      + <small class="text-secondary">free shiping</small> <br>  <strong class="h6 fw-bolder text-success">+ 5% cashback </strong> 
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
</div></div></div></div>

<br>

<div class="container">
  <br>
<strong class="h2  pe-2 fw-bolder ">Find the best Stores </strong> <a href="" class="h6">See All</a>
<br></div>
<br>
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
</div></div></div></div>

<br>


<div class="container">
  <br>
<strong class="h2  pe-2 fw-bolder ">Find the best Coupons </strong> <a href="" class="h6">See All</a>
<br><br> </div>
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
</div></div>



  <div class="col ">
  <div class="card  mb-3" style="max-width: 16rem;">
    <div class="card-header bg-transparent ">Header</div>
    <div class="card-body text-success">
      <h5 class="card-title">Success card title</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    </div>
    <div class="card-footer bg-transparent ">Footer</div>
  </div></div>

  <div class="col ">
  <div class="card  mb-3" style="max-width: 16rem;">
    <div class="card-header bg-transparent ">Header</div>
    <div class="card-body text-success">
      <h5 class="card-title">Success card title</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    </div>
    <div class="card-footer bg-transparent ">Footer</div>
  </div></div>

  <div class="col ">
  <div class="card  mb-3" style="max-width: 16rem;">
    <div class="card-header bg-transparent ">Header</div>
    <div class="card-body text-success">
      <h5 class="card-title">Success card title</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    </div>
    <div class="card-footer bg-transparent ">Footer</div>
  </div></div>

</div>
</div>
@endsection 
