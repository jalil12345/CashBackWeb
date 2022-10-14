@extends('layouts.app')

@section('content')
<br>

<form action="update-account" method="post">
        @csrf
<div class="container ">
    
    <div class="h2 wf-bold pb-2">Change your Account Details </div> 
    <hr>
    <div class="row py-2">
    <div class="col-4">
        <span class="h5">User Name</span>  
    </div>
    <div class="col-4">
      <input name="name0" class="form-control"type="text" value="{{ Auth::user()->name }}">
      </div>
    <div class="col-4">
     <span class="h5"> required</span> 
    </div>  
    </div>
   <hr>
    <div class="row py-2">
    <div class="col-4">
        <span class="h5">Email</span>  
    </div>
    
    <div class="col-4">
    <input name="email0" class="form-control" type="text" value="{{ Auth::user()->email}}">
      </div>
    <div class="col-4">
    <span class="h5"> required</span>
         
    </div>  
    </div>
    <hr>
    <div class="row py-2">
    <div class="col-4">
        <span class="h5">Phone Number</span>  
    </div>
    
    <div class="col-4">
       <input name="phone_number0" class="form-control" type="text" value="{{ Auth::user()->phone_number}}">
      </div>
    <div class="col-4">
    <span class="h5"></span>
         
    </div>  
    </div>
    <hr>
    <div class="row py-2">
    <div class="col-4">
        <span class="h5">Zip Code</span>  
    </div>
    
    <div class="col-4">
    <input name="zip_code0" class="form-control"type="text" value="{{ Auth::user()->zip_code}}">
      </div>
    <div class="col-4">
    <span class="h5"></span>
         
    </div>  
    </div>
    <hr>
    <div class="row py-2">
    <div class="col-4">
        <span class="h5">Country</span>  
    </div>
    <div class="col-4">
        
        
        
      </div>
    <div class="col-4">
       <span class="h5"></span>
    </div>  
    </div>

    <hr>
    </div>

    <br>
    <div class="container">
  
      <button class="h5 btn btn-custom-pink rounded-5 mx-2 " name="submit"type="submit">Save Change </button>
      <a class="h5 btn btn-secondary rounded-5 mx-2 " href="account-details">Cancel Change </a>
    
  </div>
  <input name="id0" type="text" style="display:none;" value="{{ Auth::user()->id}}">
</form>
    
<script>

</script>
<br><br><br><br><br><br><br>


@endsection 
