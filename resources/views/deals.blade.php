@extends('layouts.app')

@section('content')



<search id="app1" class="py-0"></search> 
<br>
<div class="container g-4"><spam class="h2 fw-bold ">Find Best Deals</spam></div><br>

<div class="container ">
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xlg-5">
<div class="col "> 

  <div class="card  mb-3 rounded-4" style="max-width: 20rem;">
    <div class="card-header bg-transparent ">{{ __('Walmart:6 hours ago') }}     </div>
    <div class="card-body ">
    <a href="#">
  <img loading="auto" src="{{ asset('images/company/1.jpg') }}" class="card-img-top rounded-4"  alt="..." ></a>
    
    </div>
    <div class="card-footer bg-transparent "><strong class="h5 fw-bold">Product name </strong> 
      <br><strong class="h4 fw-bolder"> 5$  </strong>
      <small class="text-secondary text-decoration-line-through">$10</small> 
      <br><small class="text-secondary">free shiping</small>  <br> <strong class="h5 fw-bolder text-success">5% cash back </strong> 
    </div>
  </div></div>


</div>
</div>
@endsection 
