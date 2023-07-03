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
        created(){
            console.log('Component created.')
            axios.get('https://www.macklara.com/api/users',{
        }).then(response=>{
            this.emptyArray3=response.data
            
        }).catch(err=>{
            console.log(err);
        });
        },
        
        methods: {
            
      getSearch3(e){
       
      let txt = "";
      let userData3=e.target.value;
     axios.get('https://www.macklara.com/api/users?search='+userData3,{
        }).then(response=>{
            this.emptyArray3=response.data
        }).catch(err=>{
            console.log(err);
        });  
    
        function select3(element){
                let selectUserData=element.textContent;
                document.getElementById("user_name0").value=selectUserData;
                }
    },
    }}
</script>
<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="GET">
                <input class="form-control dropdown"
                 id="user_name0" type="text" 
                 @keyup="getSearch3"
                 @click="getSearch3"
                 name="search" placeholder="Search..." 
                 aria-label="Search" autocomplete="off"
                 data-bs-toggle="dropdown" aria-expanded="false">
                
                <ul class="dropdown-menu dropdown-menu  rounded-start" 
                    aria-labelledby="user_name0"
                    id="iid0">
                    <li v-for="(item, index) in emptyArray3" class="dropdown-item">
                        {{ item.name }}</li>
                    <li class="dropdown-item"> hhhhhhh</li>
                </ul></form></div>
            </div>
        </div>
</template>


