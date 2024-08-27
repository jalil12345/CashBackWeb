<template>
  <div>
    <!-- Filter Options -->
    <div class="filters mb-4 d-flex justify-content-start">
      <div class="dropdown me-2">
        <button
          class="btn btn-outline-custom-color  rounded-pill dropdown-toggle"
          type="button"
          id="sortDropdown"
          data-bs-toggle="dropdown"
          aria-expanded="false"
        >
          {{ sortText }}
        </button>
        <ul class="dropdown-menu" aria-labelledby="sortDropdown">
          <li>
            <a class="dropdown-item" href="#" @click="handleSortChange('default', 'Sort by: Default')">
              <span class="text-custom-color">Default</span>
            </a>
          </li>
          <li>
            <a class="dropdown-item" href="#" @click="handleSortChange('a-z', 'Sort by: A to Z')">
              <span class="text-custom-color">Sort A to Z</span>
            </a>
          </li>
          <li>
            <a class="dropdown-item" href="#" @click="handleSortChange('z-a', 'Sort by: Z to A')">
              <span class="text-custom-color">Sort Z to A</span>
            </a>
          </li>
        </ul>
      </div>
      <span class="mx-1 my-1 fw-bold ">and</span>
      <div class="dropdown ms-2">
        <button
          class="btn btn-outline-custom-color  rounded-pill dropdown-toggle"
          type="button"
          id="categoryDropdown"
          data-bs-toggle="dropdown"
          aria-expanded="false"
        >
          {{ categoryText }}
        </button>
        <ul class="dropdown-menu" aria-labelledby="categoryDropdown" >
          <li class="d-grid gap-1 d-flex dropdown-item bg-light">
            <a class="btn btn-outline-custom-color  rounded-pill mt-1  flex-fill " href="#" @click="handleCategoryChange('all', 'Category: All')">
              <span class="">All Categories</span>
            </a>
            <a class="btn btn-outline-custom-color  rounded-pill mt-1  flex-fill " href="#" @click="handleCategoryChange('Electronics', 'Category: Electronics')">
              <span class="">Electronics</span>
            </a>
            <a class="btn btn-outline-custom-color  rounded-pill mt-1  flex-fill " href="#" @click="handleCategoryChange('fashion', 'Category: Fashion')">
              <span class="">Fashion</span>
            </a>
            <!-- Add more categories as needed -->
          </li>
          <li class="d-grid gap-1 d-flex dropdown-item bg-light">
            <a class="btn btn-outline-custom-color  rounded-pill mt-1  flex-fill" href="#" @click="handleCategoryChange('all', 'Category: All')">
              <span class="">All Categories</span>
            </a>
            <a class="btn btn-outline-custom-color   rounded-pill mt-1  flex-fill" href="#" @click="handleCategoryChange('Electronics', 'Category: Electronics')">
              <span class="">Electronics</span>
            </a>
            <a class="btn btn-outline-custom-color  rounded-pill mt-1  flex-fill" href="#" @click="handleCategoryChange('fashion', 'Category: Fashion')">
              <span class="">Fashion</span>
            </a>
            <!-- Add more categories as needed -->
          </li>
        </ul>
      </div>
    </div>

    <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 row-cols-xl-5">
      <div class="col" v-for="(company, index) in visibleCompanies" :key="index">
        <div class="shadow card border-light mb-3 rounded-3" style="max-width: 20rem;">
          <a :href="`stores/name/${company.name}`">
            <img :src="`images/company/${company.image}`" loading="lazy" class="card-img-top rounded-3 img-fluid" alt="..." @error="handleImageError">
          </a>
          <div class="bg-white border-light text-center mb-1">
            <span v-if="company.sub_category === 1">
              <strong class="h6 fw-bold text-custom-color">Up to: {{ formatCashback(company.rate) }}%</strong>
            </span>
            <span v-else-if="company.fix_amount !== null && (parseFloat(company.fix_amount) != 0.0)">
              <strong class="h6 fw-bold text-custom-color">${{ formatCashback(company.fix_amount) }}</strong>
            </span>
            <span v-else-if="company.rate == null" class="h6 fw-bold text-custom-color">
              0%
            </span>
            <span v-else>
              <strong class="h6 fw-bold text-custom-color">{{ formatCashback(company.rate) }}%</strong>
            </span>
          </div>
        </div>
      </div>
    </div>

    <div id="sentinel" style="height: 10px;"></div>
  </div>
</template>
<script>
import { formatCashback } from '../helpers';
import axios from 'axios';

export default {
  data() {
    return {
      visibleCompanies: [], // Store currently visible companies
      perPage: 30,
      page: 1, // Track the current page
      isFetching: false,
      hasMoreData: true, // Track if there are more companies to fetch
      sortOption: 'default', // Add sorting option
      categoryFilter: 'all', // Add category filter
      allCompanies: [], // Store all fetched companies for filtering
      sortText: 'Sort by', // Text for sort button
      categoryText: 'Category', // Text for category button
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
          .get('/api/1/companies', {
            params: {
              perPage: this.perPage,
              page: this.page,
            },
          })
          .then((response) => {
            const newCompanies = response.data.data;
            if (newCompanies.length > 0) {
              this.allCompanies = [...this.allCompanies, ...newCompanies];
              this.applyFilters();
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
    applyFilters() {
      let filteredCompanies = this.allCompanies;

      if (this.categoryFilter !== 'all') {
        filteredCompanies = filteredCompanies.filter(company => company.category === this.categoryFilter);
      }

      if (this.sortOption === 'a-z') {
        filteredCompanies.sort((a, b) => a.name.localeCompare(b.name));
      } else if (this.sortOption === 'z-a') {
        filteredCompanies.sort((a, b) => b.name.localeCompare(a.name));
      }

      this.visibleCompanies = filteredCompanies;
    },
    handleSortChange(sortOption, sortText) {
      this.sortOption = sortOption;
      this.sortText = sortText;
      this.applyFilters();
    },
    handleCategoryChange(categoryFilter, categoryText) {
      this.categoryFilter = categoryFilter;
      this.categoryText = categoryText;
      this.applyFilters();
    },
  },
};
</script>
