@extends('layouts.app')

@section('content')
<br>



    <div class="container ">
    <div class="h2 wf-bolder pb-2">Account Details</div> 
    <hr>
    <div class="row py-2">
    <div class="col-4">
        <span class="h5">User Name</span>  
    </div>
    <div class="col-4">
        <span   class="h5">{{ Auth::user()->name }}</span>
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
        <span   class="h5">{{ Auth::user()->email }}</span>
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
        <span   class="h5">{{ Auth::user()->phone_number }}</span>
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
        <span   class="h5">{{ Auth::user()->zip_code }}</span>
      </div>
    <div class="col-4">
    <span class="h5"></span>
         
    </div>  
    </div>
    <hr>
    <div class="row py-2">
    <div class="col-4">
        <span class="h5">User Name</span>  
    </div>
    <div class="col-4">
        <span   class="h5">{{ Auth::user()->name }}</span>
      </div>
    <div class="col-4">
       <span class="h5"></span>
    </div>  
    </div>

    <hr>
    </div>
    <br>
    <div class="container">
  <div class="row">
    <div class="col-3"></div>
    <div class="col-9">
      <a class="  h5 btn btn-custom-pink rounded-5 ms-5 " href="update-account">Change your informations</a>
    </div>
  </div>
    <div class="container">
    <div class="row "><div class="col align-self-end">
        
        </div></div></div>
<br><br><br><br>
     
    <div class="container">
   
    </div>
<br> 

    <div class="container  h2 wf-bolder">{{ __('Trips') }}</div>
    <br>
<div class="container ">
<div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 ">

  <div class="col ">
    <div class="card rounded-3">
      <img src="{{ asset('images/c.png') }}" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="{{ asset('images/c.png') }}" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="{{ asset('images/c.png') }}" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="{{ asset('images/c.png') }}" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
    </div>
  </div>
 </div>
</div>


























































































































<!--     
    <div class="container">
    <form class="row g-3 needs-validation" novalidate>
  <div class="col-md-4">
    <label for="validationCustom01" class="form-label ">First name</label>
    <input type="text" class="form-control" id="validationCustom01" value="Mark" required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
  <div class="col-md-4">
    <label for="validationCustom02" class="form-label">Last name</label>
    <input type="text" class="form-control" id="validationCustom02" value="Otto" required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
  <div class="col-md-4">
    <label for="validationCustomUsername" class="form-label">Username</label>
    <div class="input-group has-validation">
      <span class="input-group-text" id="inputGroupPrepend">@</span>
      <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
      <div class="invalid-feedback">
        Please choose a username.
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <label for="validationCustom03" class="form-label">City</label>
    <input type="text" class="form-control" id="validationCustom03" required>
    <div class="invalid-feedback">
      Please provide a valid city.
    </div>
  </div>
  <div class="col-md-3">
    <label for="validationCustom04" class="form-label">State</label>
    <select class="form-select" id="validationCustom04" required>
      <option selected disabled value="">Choose...</option>
      <option>...</option>
    </select>
    <div class="invalid-feedback">
      Please select a valid state.
    </div>
  </div>
  <div class="col-md-3">
    <label for="validationCustom05" class="form-label">Zip</label>
    <input type="text" class="form-control" id="validationCustom05" required>
    <div class="invalid-feedback">
      Please provide a valid zip.
    </div>
  </div>
  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
      <label class="form-check-label" for="invalidCheck">
        Agree to terms and conditions
      </label>
      <div class="invalid-feedback">
        You must agree before submitting.
      </div>
    </div>
  </div>
  <div class="col-12">
    <button class="btn btn-primary" type="submit">Save Change</button>
  </div>
</form></div>



<script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
            })
        })()
</script> -->
@endsection 
