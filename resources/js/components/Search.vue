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
        // created(){
        //     console.log('Component created.')
        //     axios.get('http://127.0.0.1:8000/api/companies',{
        // }).then(response=>{
        //     this.emptyArray3=response.data
            
        // }).catch(err=>{
        //     console.log(err);
        // });
        // },
        
        methods: {
            
      getSearch4(e){
       
      let txt = "";
    //   let emptyArray3=[];
      let userData3=e.target.value;
      
     axios.get('http://127.0.0.1:8000/api/companies?search='+userData3,{
        }).then(response=>{
            // console.log(response.data.length);
            // for (let index = 0; index < response.data.length; index++) {
            //      let element = response.data[index].name;
            //      console.log(element);
            // }
            
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
                <input class="form-control dropdown "
                 id="user_name2" type="text" 
                 @keyup="getSearch4"
                 @click=""
                 name="search" placeholder="Search..." 
                 aria-label="Search" autocomplete="off"
                 data-bs-toggle="dropdown" aria-expanded="false">
                
                <ul class="dropdown-menu dropdown-menu rounded-start" 
                    aria-labelledby="user_name2">
                    <a v-for="(item, index) in emptyArray3" 
                    style="text-decoration: none;" class="text-dark" :href="`stores/${item.name}`" >
                    <li  class="dropdown-item" >
                        {{item.name}}</li></a>
                    <li v-for="(item, index) in emptyArray3" class="dropdown-item">
                        {{item.category}}</li>
                    <li class="dropdown-item">hhhhhhh</li>
                </ul></form></div>
            </div>
        </div>
</template>


