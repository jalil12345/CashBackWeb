<script>
export default {
  data() {
    return {
      visibleCompanies: [], // Store currently visible companies
      perPage: 30,
      page: 1, // Track the current page
      isFetching: false,
      hasMoreData: true, // Track if there are more companies to fetch
    };
  },
  mounted() {
    this.setupIntersectionObserver();
  },
  methods: {
    fetchCompanies() {
      if (!this.isFetching && this.hasMoreData) {
        this.isFetching = true;
        axios
          .get('http://127.0.0.1:8000/api/companies', {
            params: {
              perPage: this.perPage,
              page: this.page,
            },
          })
          .then((response) => {
            const newCompanies = response.data.data;
            if (newCompanies.length > 0) {
              this.visibleCompanies = [...this.visibleCompanies, ...newCompanies];
              this.page++; // Increment the page for the next request
            } else {
              // No more data to fetch
              this.hasMoreData = false;
            }
            this.isFetching = false;
          })
          .catch((err) => {
            console.error('Error fetching companies:', err);
            this.isFetching = false;
          });
      }
    },

    setupIntersectionObserver() {
      const options = {
        root: null,
        rootMargin: '0px',
        threshold: 0.25,
      };

      const observer = new IntersectionObserver(
        (entries) => {
          if (entries[0].isIntersecting && this.hasMoreData) {
            this.fetchCompanies();
          }
        },
        options
      );

      // Target the element just below the last visible company card to observe
      const sentinelElement = document.getElementById('sentinel');
      if (sentinelElement) {
        observer.observe(sentinelElement);
      }

      // Fetch initial set of companies
      this.fetchCompanies();
    },
  },
};
</script>

<template>
  <div>
    
    <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xlg-5">
      
      <div class="col "
      v-for="(company, index) in visibleCompanies" :key="index">
        <div  class=" shadow card border-light mb-3 rounded-2" style="max-width: 20rem;">
          <a :href="`stores/name/${company.name}`">
                <img :src="`images/company/${company.image}`" 
                 loading="lazy" class="card-img-top rounded-2" alt="..."> 
          </a>
          <div class="card-footer bg-transparent border-light">
            <strong class="h6 fw-bold text-success">{{ company.name }}</strong>
          </div>
        </div>
      </div>
    </div>
   
    <div id="sentinel" style="height: 10px;"></div>
  </div>
</template>


