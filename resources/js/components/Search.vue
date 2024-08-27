<script>
import { formatCashback } from '../helpers';
  export default {
    data() {
      return {
        emptyArray3: [],
        searchText: ''
      }
    },
    props: [],
    mounted() {
      console.log('Component mounted.')
    },
    methods: {
      formatCashback,
      async getSearch4(e) {
        this.searchText = e.target.value;
        let userData3 = this.searchText;
        try {
          const response = await axios.get('/api/stores?search='+userData3);
          this.emptyArray3 = response.data;
        } catch (err) {
          console.log(err);
        }
      },
      highlightMatchingText(text) {
        const regex = new RegExp(this.searchText, 'gi');
        const highlightedText = text.replace(regex, '<span class="highlight">$&</span>');
        return `<span class="">${highlightedText}</span>`;
      },
      getHighlightedText(item) {
        let text = item.name ? this.highlightMatchingText(item.name) : '';
        if (item.sub_category === 1) {
          text += `<strong class="h6 fw-bold text-custom-color text-center float-end">Up to: ${this.formatCashback(item.rate)}%</strong>`;
        } else if (item.fix_amount !== null && (parseFloat(item.fix_amount) !== 0.0)) {
          text += `<strong class="h6 fw-bold text-custom-color text-center float-end">$${this.formatCashback(item.fix_amount)}</strong>`;
        }else if (item.rate == null ) {
          text += `<strong class="h6 fw-bold text-custom-color text-center float-end">0%</strong>`;
        } else {
          text += `<strong class="h6 fw-bold text-custom-color text-center float-end">${this.formatCashback(item.rate)}%</strong>`;
        }
        return text; 
      },
      // Method for highlighting category text 
      highlightCategoryText(text) {
        if (!text) return '';
        const regex = new RegExp(this.searchText, 'gi');
        return text.replace(regex, '<span class="highlight">$&</span>');
      },
      select3(element) {
        let selectUserData = element.textContent;
        document.getElementById("user_name2").value = selectUserData;
      },
    }
  }
</script>

<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <form method="GET">
          <div class="dropdown">
            <input 
              class="form-control search-input" 
              id="user_name2" 
              type="text" 
              @keyup="getSearch4" 
              @click="getSearch4"
              name="search" 
              placeholder="Search..." 
              aria-label="Search" 
              autocomplete="off" 
              data-bs-toggle="dropdown" 
              aria-expanded="false"
            >
            <div class="dropdown-menu dropdown-menu-width rounded-start" aria-labelledby="user_name2">
              <li class="h6 ms-1 fw-bold">Stores</li>
              <a v-for="(item, index) in emptyArray3" v-if="index < 5" style="text-decoration: none;" 
                  class="text-dark" :href="`/stores/name/${item.name}`">
                  <li class="dropdown-item">
                    <span v-html="getHighlightedText(item)"> </span>
                  </li>
              </a>

              <li class="h6 ms-1 fw-bold">Categories</li>
              <a v-for="(item, index) in emptyArray3" v-if="index < 4" style="text-decoration: none;" 
                  class="text-dark" :href="`/stores/category/${item.category}`">
                <li class="dropdown-item" v-html="highlightCategoryText(item.category)"></li>
              </a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<style>
  .dropdown-menu-width {
    width: 100%; /* Set the width to 100% or adjust as needed */
  }
  .highlight {
    background-color: yellow; /* Set your desired highlight color */
    font-weight: bold; /* Optionally, make the text bold */
  }
  .search-input {
  border: 1px solid rgb(210, 163, 255); /* Default border color */
}
.search-input:hover {
  border: 1px solid rgb(163, 68, 252); /* Default border color */
  
}
.search-input:focus {
  border-color: rgb(154, 48, 253); /* Border color when focused */
  box-shadow: 0 0 0 2px rgb(171, 89, 248);
}
</style>
