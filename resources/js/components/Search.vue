
<script>
    export default {
        data() {
        return {
            emptyArray3:[]
        }
        },
        props: [],
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            
      getSearch4(e){
       
      let txt = "";
      let userData3=e.target.value;
     axios.get('http://127.0.0.1:8000/api/companies?search='+userData3,{
        }).then(response=>{
            this.emptyArray3=response.data
        }).catch(err=>{
            console.log(err);
        }); 
    },
    select3(element){
                let selectUserData=element.textContent;
                document.getElementById("user_name2").value=selectUserData;
                },
    }}
</script>
<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="GET">
                <div class="dropdown"> 
                <input 
                 class="form-control "
                 id="user_name2" 
                 type="text" 
                 @keyup="getSearch4"
                 @click="getSearch4"
                 name="search"
                 placeholder="Search..." 
                 aria-label="Search" 
                 autocomplete="off"
                 data-bs-toggle="dropdown" 
                 aria-expanded="false">
                
                <div class=" dropdown-menu dropdown-menu-width rounded-start" 
                    aria-labelledby="user_name2">
                    <li class="h6 ms-1 fw-bold">Stores</li>
                    <a 
                    v-for="(item, index) in emptyArray3" 
                    v-if="index < 5"
                    style="text-decoration: none;" 
                    class="text-dark" 
                    :href="`stores/name/${item.name}`" >
                    <li  class="dropdown-item" >{{item.name}}-{{item.rate}}</li>
                    </a>
                    <li class="h6 ms-1 fw-bold">Categories</li>
                    <a 
                    v-for="(item, index) in emptyArray3" 
                    v-if="index < 4"
                    style="text-decoration: none;" 
                    class="text-dark" 
                    :href="`stores/category/${item.category}`" >
                    <li class="dropdown-item">{{item.category}}</li>
                    </a>
                </div>
                </div>
            </form>
        </div>
    </div>
</div>
</template>
<style>
.dropdown-menu-width {
  width: 100%; /* Set the width to 100% or adjust as needed */
}
</style>

