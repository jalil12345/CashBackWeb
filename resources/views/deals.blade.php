@extends('layouts.app')

@section('content')


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

<br><br><br><br><br><br><br><br>
<div class="container g-4"><spam class="h2 fw-bold ">Find Best Deals</spam></div><br>

<div class="container ">
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xlg-5">
<div class="col "> 

  <div class="card  mb-3 rounded-4" style="max-width: 20rem;">
    <div class="card-header bg-transparent ">{{ __('from Walmarte  :  6 hours ago') }}     </div>
    <div class="card-body text-success">
      <h5 class="card-title">Success card title</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    </div>
    <div class="card-footer bg-transparent "><strong class="h5 fw-bold">Product name </strong> 
      <br><strong class="h4 fw-bolder"> 5$  </strong>
      <small class="text-secondary text-decoration-line-through">$10</small> 
      <br><small class="text-secondary">free shiping</small>  <br> <strong class="h5 fw-bolder text-success">5% cash back </strong> 
    </div>
  </div></div>
<div class="col "> 

  <div class="card  mb-3" style="max-width: 16rem;">
    <div class="card-header bg-transparent ">{{ __('from Walmarte  :  6 hours ago') }}     </div>
    <div class="card-body text-success">
      <h5 class="card-title">Success card title</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    </div>
    <div class="card-footer bg-transparent ">Product name <br>$5 $10 <br> free shiping <br> 5% cash back 
    </div>
  </div></div>

  <div class="col "> 

<div class="card  mb-3" style="max-width: 16rem;">
  <div class="card-header bg-transparent ">{{ __('from Walmarte  :  6 hours ago') }}     </div>
  <div class="card-body text-success">
    <h5 class="card-title">Success card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
  <div class="card-footer bg-transparent ">Product name <br>$5 $10 <br> free shiping <br> 5% cash back 
  </div>
</div></div>



  <div class="col "> 

<div class="card  mb-3" style="max-width: 16rem;">
  <div class="card-header bg-transparent ">{{ __('from Walmarte  :  6 hours ago') }}     </div>
  <div class="card-body text-success">
    <h5 class="card-title">Success card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
  <div class="card-footer bg-transparent ">Product name <br>$5 $10 <br> free shiping <br> 5% cash back 
  </div>
</div></div>







  


</div>
</div>
@endsection 
