<!-- <script>
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
              <div class="text-center">
            <a ref="seeMoreButton" class="btn btn-pink text-center" @click="loadMoreCompanies">See more</a>
            </div>
        </div>
</template>

 -->

 <script>
export default {
  data() {
    return {
      companies: [],
      page: 1,
      perPage: 10 // Set initial load to 50 stores
    };
  },
  created() {
    this.fetchCompanies();
  },
  methods: {
    fetchCompanies() {
        axios.get('http://127.0.0.1:8000/api/companies', {
            params: {
            page: this.page,
            perPage: this.perPage
            }
        }).then(response => {
            this.companies = this.companies.concat(response.data);
        }).catch(err => {
            console.error("Error fetching companies:", err);
        });
        },

    loadMoreCompanies() {
      if (this.page === 1) { 
        // If it's the first page, we set subsequent loads to 20
        this.perPage = 20;
      }
      this.page++;
      this.fetchCompanies();
    },
    getSearch(searchTerm) {
      axios.get('http://127.0.0.1:8000/api/companies', {
        params: { search: searchTerm }
      }).then(response => {
        this.companies = response.data;
      }).catch(err => {
        console.error("Error searching companies:", err);
      });
    }
  }
}
</script>

<template>
    <div>
      <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xlg-5">
        <div class="col" v-for="(company, index) in companies" :key="index">
          <div class="shadow card border-light mb-3 rounded-2" style="max-width: 20rem;">
            <a :href="`stores/name/${company.name}`">
              <img :src="`images/company/${company.image}`" loading="lazy" class="card-img-top rounded-2" alt="...">
            </a>
            <div class="card-footer bg-transparent border-light">
              <strong class="h6 fw-bold text-success">{{ company.name }}</strong>
            </div>
          </div>
         
        </div>
      </div>
      
    </div>
  </template>
  