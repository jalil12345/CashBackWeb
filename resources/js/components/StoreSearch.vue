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
            axios.get('http://127.0.0.1:8000/api/companies',{
        }).then(response=>{
            this.emptyArray3=response.data
            
        }).catch(err=>{
            console.log(err);
        });
        },
        
        methods: {
     select3(item){
                this.selectedItem  = item.name;
                 this.$refs.inputField.click();
                },
     select4(item){
                this.selectedItem0  = item.name;
                this.$refs.inputField0.click();
                },       
      getSearch3(e){
      let txt = "";
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


