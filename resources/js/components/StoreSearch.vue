<script>
import { formatCashback } from '../helpers';
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
    formatCashback,
      handleImageError(event) {
      event.target.src = 'images/company/g.png'; // Provide a placeholder image
       },
    fetchCompanies() {
      if (!this.isFetching && this.hasMoreData) {
        this.isFetching = true;
        axios
          .get('/api/companies', {
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
    
    <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 row-cols-xlg-5">
      
      <div class="col "
      v-for="(company, index) in visibleCompanies" :key="index">
        <div  class=" shadow card border-light mb-3 rounded-3" style="max-width: 20rem;">
          <a :href="`stores/name/${company.name}`">
                <img :src="`images/company/${company.image}`" 
                 loading="lazy" class="card-img-top rounded-3 img-fluid" alt="..."
                 @error="handleImageError"> 
          </a>
          <div class=" bg-white border-light  text-center mb-1">
            <span v-if="company.sub_category === 1" >
              <strong class="h6 fw-bold text-custom-color ">Up to: {{formatCashback(company.rate)  }}%</strong>
            </span>
            <span v-else-if="company.fix_amount !== null && company.fix_amount !== 0" >
              <strong class="h6 fw-bold text-custom-color ">${{ formatCashback(company.fix_amount) }}</strong>
            </span>
            <span v-else-if="company.rate == null" class="h6 fw-bold text-custom-color">
                            0%</span>
            <span v-else >
              <strong class="h6 fw-bold text-custom-color ">{{formatCashback(company.rate) }}%</strong>
            </span>
          </div>
        </div>
      </div>
    </div>
   
    <div id="sentinel" style="height: 10px;"></div>
  </div>
</template>


