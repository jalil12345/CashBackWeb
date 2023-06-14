<script>
    export default {
        data() {
        return {
            emptyArray3:[],
            element:'',
            selectedItem : '',
            selectedItem0 : ''
        }
        },
        props: [],
        mounted() {
            console.log('Component mounted.')
        },
        created(){
            console.log('Component created.')
            axios.get('https://www.macklara.com/api/companies',{
        }).then(response=>{
            this.emptyArray3=response.data
            
        }).catch(err=>{
            console.log(err);
        });
        },
        
        methods: {

     select3(item){
                // let selectUserData=element.path[0].attributes.text.value;
                //  console.log(selectUserData);
                //  document.getElementById("user_name0").value=selectUserData;
                // document.getElementById("user_name0").click();
                this.selectedItem  = item.name;
                 this.$refs.inputField.click();
                
                },
     select4(item){
                // let selectUserData=element.path[0].attributes.text.value;
                // console.log(selectUserData);
                // document.getElementById("user_name1").value=selectUserData;
                // document.getElementById("user_name1").click();
                this.selectedItem0  = item.name;
                this.$refs.inputField0.click();
                },       
      getSearch3(e){
       
      let txt = "";
    //   let emptyArray3=[];
      let userData3=e.target.value;
      
     axios.get('https://www.macklara.com/api/companies?search='+userData3,{
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
                <!-- <form method="GET">
                <div class="row">
                 <div class="col-5 dropdown">   
                <label for="" class="form-label ms-1"> Stores</label>
                <input class="form-control  mb-3 "
                ref="inputField" v-model="selectedItem"
                 id="user_name0" type="text" 
                 @keyup="getSearch3"
                 @click="getSearch3"
                 name="search" placeholder="Search..." 
                 aria-label="Search" autocomplete="off"
                 data-bs-toggle="dropdown" aria-expanded="false">
                
                <ul class="dropdown-menu dropdown-menu  rounded-start" 
                    aria-labelledby="user_name0"
                    id="iid0">
                    <li v-for="(item, index) in emptyArray3" @click="select3(item)" 
                    v-if="index < 5" :text="item.name"
                     class="dropdown-item" >
                        {{ item.name }}</li>
                    
                </ul></div>
                <div class="col-6 dropdown">
                <label for="" class="form-label ms-1"> Categories</label>
                <input class="form-control  mb-3"
                ref="inputField0" v-model="selectedItem0"
                 id="user_name1" type="text" 
                 @keyup="getSearch3"
                 @click="getSearch3"
                 name="search" placeholder="Search..." 
                 aria-label="Search" autocomplete="off"
                 data-bs-toggle="dropdown" aria-expanded="false">
                
                <ul class="dropdown-menu dropdown-menu  rounded-start" 
                    aria-labelledby="user_name1"
                    id="iid0">
                    <li v-for="(item, index) in emptyArray3" @click="select4(item)" v-if="index < 5"
                     class="dropdown-item" :text="item.category">
                        {{ item.category }}</li>
                    
                </ul></div>
            </div>
            </form> -->
            
                <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xlg-5" >
                <div class="col " v-for="(item, index) in emptyArray3"> 
                <div class="shadow card border-light mb-3 rounded-2" style="max-width: 20rem ;">
              <a :href="`stores/name/${item.name}`">
              <img  :src="`images/company/${item.image}`" loading="lazy"
              class="card-img-top rounded-2"  alt="..." ></a>
              <div class="card-footer  bg-transparent border-light "> 
              <strong  class="h6 fw-bold text-success" > {{ item.name }}</strong >   
              </div></div></div></div>
            
        </div>
</template>


