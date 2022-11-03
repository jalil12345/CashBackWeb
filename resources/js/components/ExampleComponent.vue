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
            axios.get('http://127.0.0.1:8000/api/users',{
        }).then(response=>{
            this.emptyArray3=response.data
            
        }).catch(err=>{
            console.log(err);
        });
        },
        
        methods: {
            
      getSearch3(e){
       
      let txt = "";
    //   let emptyArray3=[];
      let userData3=e.target.value;
      
     axios.get('http://127.0.0.1:8000/api/users?search='+userData3,{
        }).then(response=>{
            // console.log(response.data.length);
            // for (let index = 0; index < response.data.length; index++) {
            //      let element = response.data[index].name;
            //      console.log(element);
            // }
            
            this.emptyArray3=response.data
            // .forEach(myFunction);
            // document.getElementById("iid0").innerHTML = txt;
            // function myFunction(value) {
            //  txt += '<li class="dropdown-item" >'+value.name+'</li>';
            //           }
                    //   emptyArray3=response.data;
        // showSuggestions3(emptyArray3);
    //     let allList3=document.getElementById("iid0").querySelectorAll("li");
        
    //       for (let ii = 0; ii < allList3.length; ii++) {
    //        allList3[ii].setAttribute("onclick",select3(this));
           
    //    }
       
        }).catch(err=>{
            console.log(err);
        });  
    //     function showSuggestions3(list){
    //           let listData;
    //               listData=list.join('');
    //    }
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


