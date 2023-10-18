<script>
   export default {
  data() {
    return {
      favoriteCompanies: [],
      companies: [],
      page: 1,
      perPage: 20,
      maxRounds: 5,
      rounds: 0
    };
  },
  mounted() {
    EventBus.$on('favoriteCompaniesUpdated', updatedCompanies => {
      this.favoriteCompanies = updatedCompanies;
    });
    this.fetchFavoriteCompanies();
    this.loadMoreCompanies();
  },
  methods: {
    fetchFavoriteCompanies() {
      axios
        .get('http://127.0.0.1:8000/api/api-favorites')
        .then(response => {
          this.favoriteCompanies = response.data;
        })
        .catch(error => {
          console.error(error);
        });
    },
    loadMoreCompanies() {
      if (this.rounds >= this.maxRounds) {
        // Reached the maximum number of rounds, hide the "See more" button
        this.$refs.seeMoreButton.style.display = 'none';
        return;
      }

      axios
        .get('http://127.0.0.1:8000/api/companies', {
          params: {
            page: this.page,
            perPage: this.perPage
          }
        })
        .then(response => {
          const newCompanies = response.data;

          if (newCompanies.length > 0) {
            const filteredCompanies = newCompanies.filter(company => {
              return !this.favoriteCompanies.some(
                favorite => favorite.company_id === company.id
              );
            });
            this.companies = this.companies.concat(filteredCompanies);
            this.page++;
            this.rounds++;
          } else {
            // No more companies to load, hide the "See more" button
            this.$refs.seeMoreButton.style.display = 'none';
          }
        })
        .catch(error => {
          console.error(error);
        });
    },
    toggleFavorite(companyId) {
  axios
    .post('/api/favorites/toggleFavorite/' + companyId)
    .then(response => {
      const updatedCompany = response.data;
      
      const index = this.companies.findIndex(
        company => company.id === updatedCompany.id
      );
      if (index !== -1) {
        this.companies.splice(index, 1, updatedCompany);
      }
      
      axios
        .get('http://127.0.0.1:8000/api/api-favorites')
        .then(response => {
          // const favoriteIndex = this.companies.findIndex(
          //   company => company.id === updatedCompany.company_id
          // );
          // if (favoriteIndex !== -1) {
          //   this.companies.splice(favoriteIndex, 1);
          // }
          EventBus.$emit('favoriteCompaniesUpdated', response.data);
        })
        .catch(error => {
          console.error(error);
        });
    })
    .catch(error => {
      // Handle the error if needed
      console.error(error);
    });
},
isFavoriteCompany(companyId) {
    return this.favoriteCompanies.some(favorite => favorite.company_id === companyId);
  }
  }
   }; 
</script>
<template>
  <div>
  <div class="card">
        <div class="card-body">
       <h2 class="card-title">Favorite Stores</h2>
    <div>
    <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xlg-5">
      <div class="col" v-for="(favorite, index) in favoriteCompanies" :key="index">
        <div class="card mb-3">
          <div class="card-body ">
            <div class=" d-flex align-items-center justify-content-between">
            
                       <a  href="#" class="text-pink" @click.prevent="toggleFavorite(favorite.company_id)">
                        <i class="text-pink">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                            </svg>
                        </i>
                      </a>
                      <a class="h4 text-dark" 
                      :href="`stores/name/${favorite.name}`"
                      style="text-decoration: none;"
                      >{{ favorite.name }}</a>
                      <span class="h5 fw-bold text-success">{{ favorite.rate }}</span>
                    </div>
          </div>
        </div>
      </div>
    </div>
</div>
</div>
</div>
<br>
<div class="card">
        <div class="card-body">
       <h3 class="card-title">Recommended Stores</h3>
       <div>
        <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xlg-5">
            <div class="col" v-for="(company, index) in companies.slice(0, page * perPage)">
                <div class="card mb-3" v-if="!isFavoriteCompany(company.id)">
                    <div class="card-body">
                      <div class=" d-flex align-items-center justify-content-between">
                        <a href="#" class="text-pink" @click.prevent="toggleFavorite(company.id)">
                        <i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" 
                            class="bi bi-heart" viewBox="0 0 16 16">
                            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                            </svg>
                        </i>
                        </a>
                        <a class="h4 text-dark" 
                        :href="`stores/name/${company.name}`"
                        style="text-decoration: none;"
                        >{{ company.name }}</a>
                        <span class="h5 fw-bold text-success">{{ company.rate }}</span>
                      
                    </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center">
            <a ref="seeMoreButton" class="btn btn-pink text-center" @click="loadMoreCompanies">See more</a>
        </div>
    </div>   
    </div>
  </div>
  </div>
</template>


