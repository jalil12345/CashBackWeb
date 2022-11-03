
@extends('layouts.app')

@section('content')
      
<div class="container">
    <h1 class="text-center text-dark">Laravel 9 Scout Full Text Search Tutorial - ItSolutionStuff.com</h1>
  
    <form method="GET">
        <div class=" dropdown dropdown input-group"
        >
          <input 
            id="user_name"
            type="text" 
             name="search"
            value="{{ request()->get('search') }}" 
            class="  dropdown form-control" 
            placeholder="Search..." 
            aria-label="Search" 
            autocomplete="off"
            data-bs-toggle="dropdown" aria-expanded="false">
          <button class="btn btn-success" type="submit" id="button-addon2">Search</button>
        
    </form>
    

    <ul class="dropdown-menu dropdown-menu rounded-end rounded-start" 
    aria-labelledby="user_name"
    id="iid">
    @foreach($users as $user)
    <li><a class="dropdown-item" href="#">{{ $user->name }}</a></li>
    <li><a class="dropdown-item" href="#">{{ $user->email }}</a></li>
    @endforeach
  </ul></div>

 <div  id="auto"></div>
</div>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td >{{ $user->id }}</td>
                <td >{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
</div>
<div class="container" id="app0">
    <example-component></example-component>
</div><br><br><br><br><br><br><br><br><br><br>
<br><br><br>
    
<script>
    // const inputBox0 = document.getElementById("user_name");
    // const suggBox0 = document.getElementById("iid");
    
    // const getSearch =(e)=>{
    //     let userData0=e.target.value;
    //     console.log(userData0);  
    //  axios.get('http://127.0.0.1:8000/api/users?search='+userData0,{
            
    //     }).then(response=>{
    //         console.log(response.data.length);
    //         for (let index = 0; index < response.data.length; index++) {
    //              let element = response.data[index].name;
    //              let email = response.data[index].email;
    //              console.log(element);
    //              console.log(email);
                 
    //             //  suggBox0.innerHTML='<li><a class="dropdown-item" href="#">'+element+'</a></li>'+
    //             //  '<li><a class="dropdown-item" href="#">'+email+'</a></li>';
    //         }
    //         let txt = "";
    //         response.data.forEach(myFunction);
    //         document.getElementById("iid").innerHTML = txt;
    //         function myFunction(value) {
    //                     txt +='<li><a class="dropdown-item" href="#">'+value.name + '</a></li>'+
    //                     '<li><a class="dropdown-item" href="#">'+value.email+'</a></li>'; 
    //                     }
    //         // suggBox.innerHTML=;
    //     }).catch(err=>{
    //         console.log(err);
    //     });  
    // };
   
    // inputBox0.addEventListener('keyup',getSearch);
</script>


@endsection 
