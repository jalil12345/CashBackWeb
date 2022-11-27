@extends('layouts.app')

@section('content')
<br>  
                  <search id="app1"></search>  
<div class="container"id="body">

<br><br>
<div class="container" >
  <br>
<strong class="h2  pe-2 pb-3 fw-bolder ">All Stores List </strong>  <br><br>

<store-search id="app0"></store-search>

<div class="row">
<div class="dropdown col-5">
<label for="browser" class="form-label">Categories</label>
  <input class="form-control "  id="browser" data-bs-toggle="dropdown"
   aria-expanded="true"autocomplete="off" placeholder="All">
  
  <ul class="dropdown-menu" aria-labelledby="browser" id="ooo">
    <li><a class="dropdown-item" href="#">amazon</a></li>
  </ul></div> 
<div class="dropdown col-6">
<label for="browser1" class="form-label"> Stores</label>
  <input class="form-control "  id="browser1" data-bs-toggle="dropdown"
   aria-expanded="true"autocomplete="off" placeholder="All">
  
  <ul class="dropdown-menu" aria-labelledby="browser" id="ooo1">
  </ul></div> 
  </div>
<br>
<div id="row"class="row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xlg-5">
 
  <!-- @foreach($companies as $company)
  


  <div class="shadow card border-light mb-3 rounded-2" style="max-width: 20rem ;">
    <a href="#">
    <img  src="{{ asset('images/company') }}/{{ $company->image }}" class="card-img-top rounded-4"  alt="..." ></a>
    <div class="card-img-overlay">
    <strong class="h5 fw-bold  "> {{ $company->name }} </strong >
    </div>
    <div class="card-footer  bg-transparent border-light "> 
    <strong class="h5 fw-bold text-success  text-end"> 5% cashback</strong >   
      </div>
  </div>
</div>
@if ($company->id==5)
   @break
@endif

@endforeach -->

</div></div>

</div>

<script>
  var app = {{ Js::from($companies) }};
  console.log(app[0].name);

  const inputBox1 = document.getElementById("browser");
  const suggBox0 = document.getElementById("ooo");
  const inputBox2 = document.getElementById("browser1");
  const suggBox1 = document.getElementById("ooo1");

    
        
  
    const getSearch0 =(e)=>{
      let txt = "";
      let txtt = "";
      let emptyArray0=[];
      let userData1=e.target.value;
      
     axios.get('http://127.0.0.1:8000/api/companies?search='+userData1,{
        }).then(response=>{
            // console.log(response.data.length);
            for (let index = 0; index < response.data.length; index++) {
                 let element = response.data[index].name;
                 console.log(element);
            }
            
            emptyArray0=response.data.forEach(myFunction);
            document.getElementById("ooo").innerHTML = txt;
            document.getElementById("row").innerHTML = txtt;
            function myFunction(value) {
                        txt += '<li class="dropdown-item" >'+value.name+'</li>';
                        txtt += '<div class="col ">' 
            +'<div class="shadow card border-light mb-3 rounded-2" style="max-width: 20rem ;">'
              +'<a href="#">'
              +'<img  src="{{ asset("images/company") }}/'+value.image+'" class="card-img-top rounded-2"  alt="..." ></a>'
              +'<div class="card-footer  bg-transparent border-light ">' 
              +'<strong class="h6 fw-bold text-success  "> '+value.name+'</strong >'   
              +'</div></div></div>' ;
                      }
                      emptyArray0=response.data;
        showSuggestions0(emptyArray0);
        let allList0=suggBox0.querySelectorAll("li");
          for (let i = 0; i < allList0.length; i++) {
           allList0[i].setAttribute("onclick","select0(this)");   
            
       }
       
        }).catch(err=>{
            console.log(err);
        });  
    };
    function select0(element){
              let selectUserData=element.textContent;
              inputBox1.value=selectUserData;
            }
    function  showSuggestions0(list){
              let listData;
                  listData=list.join('');
    }
    inputBox1.addEventListener('keyup',getSearch0);
    inputBox1.addEventListener('click',getSearch0);
    suggBox0.addEventListener('click',()=>{document.getElementById("browser").click()});
    
  
  
    const getSearch1 =(e)=>{
      let emptyArray1=[];
        let userData1=e.target.value;  
     axios.get('http://127.0.0.1:8000/api/companies?search='+userData1,{
        }).then(response=>{
            for (let index = 0; index < response.data.length; index++) {
                 let category = response.data[index].category;
            }
            let txt = "";
            let txtt = "";
            emptyArray1=response.data.forEach(myFunction);
            document.getElementById("ooo1").innerHTML = txt;
            document.getElementById("row").innerHTML = txtt;
            function myFunction(value) {
                        txt += '<li class="dropdown-item" >'+value.category+'</li>'; 
                        txtt += '<div class="col ">' 
                      +'<div class="shadow card border-light mb-3 rounded-2" style="max-width: 20rem ;">'
                        +'<a href="#">'
                        +'<img  src="{{ asset("images/company") }}/'+value.image+'" class="card-img-top rounded-2"  alt="..." ></a>'
                        +'<div class="card-footer  bg-transparent border-light ">' 
                        +'<strong class="h6 fw-bold text-success  "> '+value.name+'</strong >'   
                        +'</div></div></div>' ;
                        }
        emptyArray1=response.data;
        showSuggestions1(emptyArray1);
        let allList1=suggBox1.querySelectorAll("li");
          for (let i = 0; i < allList1.length; i++) {
           allList1[i].setAttribute("onclick","select1(this)");       
       }
        }).catch(err=>{
            console.log(err);
        });  
    };
      inputBox2.addEventListener('keyup',getSearch1);
      inputBox2.addEventListener('click',getSearch1);
      suggBox1.addEventListener('click',()=>{document.getElementById("browser1").click()});

      function select1(element){
      let selectUserData=element.textContent;
      inputBox2.value=selectUserData;
    }
    function  showSuggestions1(list){
      let listData;
          listData=list.join('');
      }
    
      
    </script>

@endsection 
