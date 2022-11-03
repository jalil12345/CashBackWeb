<script>
    export default {
        data() {
        return {
            emptyArray3:[],
            element:''
        }
        },
        props: [],
        mounted() {
            console.log('Component mounted.')
        },
        created(){
            console.log('Component created.')
            axios.get('http://127.0.0.1:8000/api/companies',{
        }).then(response=>{
            this.emptyArray3=response.data
            
        }).catch(err=>{
            console.log(err);
        });
        },
        
        methods: {

     select3(element){
                let selectUserData=element.path[0].attributes.text.value;
                console.log(selectUserData);
                document.getElementById("user_name0").value=selectUserData;
                document.getElementById("user_name0").click();
                },
     select4(element){
                let selectUserData=element.path[0].attributes.text.value;
                console.log(selectUserData);
                document.getElementById("user_name1").value=selectUserData;
                document.getElementById("user_name1").click();
                },       
      getSearch3(e){
       
      let txt = "";
    //   let emptyArray3=[];
      let userData3=e.target.value;
      
     axios.get('http://127.0.0.1:8000/api/companies?search='+userData3,{
        }).then(response=>{
            
            
            this.emptyArray3=response.data
            
       
        }).catch(err=>{
            console.log(err);
        });  
        
    },
    }}
</script>
<template>
    <div >
                <form method="GET">
                <div class="row">
                 <div class="col-5 dropdown">   
                <input class="form-control  mb-3 "
                 id="user_name0" type="text" 
                 @keyup="getSearch3"
                 @click="getSearch3"
                 name="search" placeholder="Search..." 
                 aria-label="Search" autocomplete="off"
                 data-bs-toggle="dropdown" aria-expanded="false">
                
                <ul class="dropdown-menu dropdown-menu  rounded-start" 
                    aria-labelledby="user_name0"
                    id="iid0">
                    <li v-for="(item, index) in emptyArray3" @click="select3" 
                    class="dropdown-item" :text="item.name">
                        {{ item.name }}</li>
                    <li  class="dropdown-item">hhh </li>
                </ul></div>
                <div class="col-6 dropdown">
                <input class="form-control  mb-3"
                 id="user_name1" type="text" 
                 @keyup="getSearch3"
                 @click="getSearch3"
                 name="search" placeholder="Search..." 
                 aria-label="Search" autocomplete="off"
                 data-bs-toggle="dropdown" aria-expanded="false">
                
                <ul class="dropdown-menu dropdown-menu  rounded-start" 
                    aria-labelledby="user_name1"
                    id="iid0">
                    <li v-for="(item, index) in emptyArray3" @click="select4" 
                    class="dropdown-item" :text="item.category">
                        {{ item.category }}</li>
                    <li  class="dropdown-item">hhh </li>
                </ul></div>
            </div>
            </form>
            
                <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xlg-5" >
                <div class="col " v-for="(item, index) in emptyArray3"> 
                <div class="shadow card border-light mb-3 rounded-2" style="max-width: 20rem ;">
              <a :href="`stores/${item.name}`">
              <img  :src="item.image"
              class="card-img-top rounded-2"  alt="..." ></a>
              <div class="card-footer  bg-transparent border-light "> 
              <strong  class="h6 fw-bold text-success" > {{ item.name }}</strong >   
              </div></div></div></div>
            
        </div>
</template>


