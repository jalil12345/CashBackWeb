<script>
    // export default {
        
    //     data() {
    //         return {
    //             companies: [],
    //             page: 1,
    //             perPage: 6,
    //             maxRounds: 5,
    //             rounds: 0
    //         };
    //     },
    //     methods: {
    //         loadMoreCompanies() {
    //             if (this.rounds >= this.maxRounds) {
    //                 // Reached the maximum number of rounds, hide the "See more" button
    //                 this.$refs.seeMoreButton.style.display = 'none';
    //                 return;
    //             }

    //             axios
    //                 .get('http://127.0.0.1:8000/api/companies', {
    //                     params: {
    //                         page: this.page,
    //                         perPage: this.perPage
    //                     }
    //                 })
    //                 .then(response => {
    //                     const newCompanies = response.data;

    //                     if (newCompanies.length > 0) {
    //                         this.companies = this.companies.concat(newCompanies);
    //                         this.page++;
    //                         this.rounds++;
    //                     } else {
    //                         // No more companies to load, hide the "See more" button
    //                         this.$refs.seeMoreButton.style.display = 'none';
    //                     }
    //                 })
    //                 .catch(error => {
    //                     console.error(error);
    //                 });
    //         },
    //         toggleFavorite(companyId) {
    //             axios.post('/api/favorites/toggleFavorite/' + companyId)
    //             .then(response => {
    //                 axios.get('http://127.0.0.1:8000/api/api-favorites')
    //                     .then(response => {
    //                     const updatedCompany = response.data;
    //                     const index = this.companies.findIndex(company => company.id === updatedCompany.id);
    //                     if (index !== -1) {
    //                         this.companies.splice(index, 1, updatedCompany);
    //                     }
    //                     EventBus.$emit('favoriteCompaniesUpdated', response.data);
    //                     //  this.companies = response.data;
                        
    //                     })
    //                     .catch(error => {
    //                     console.error(error);
    //                     });
    //             })
    //             .catch(error => {
    //             // Handle the error if needed
    //             console.error(error);
    //             });
    //         }
    //     }
    // }
    
</script>
<template>
    
</template>


