<template class="dropdown">
  <div >
    <h1>Trips</h1>
    <!-- Dropdown container -->
    <div >
      <!-- Dropdown trigger -->
      <button class="btn btn-secondary dropdown-toggle" type="button" 
              data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" 
              id="dropdownMenuLink" @click="toggleDropdown">
        Trips for {{ monthYear }}
      </button>
      <!-- Dropdown menu -->
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" v-if="showDropdown">
        <li v-for="(month, index) in lastThreeMonths" :key="index" @click="fetchTripsForMonth(month)" 
            class="dropdown-item">
          {{ month }}
        </li>
      </ul>
    </div>

    <div>
      <ul v-if="trips.length > 0">
        <li v-for="(trip, index) in trips" :key="index">{{ trip.id }} - {{ trip.created_at }}</li>
      </ul>
      <p v-else>No trips found for this month.</p>
    </div>
  </div>
</template>
  <script>
  export default {
    data() {
      return {
        selectedMonth: new Date().getMonth() + 1, // Current month index + 1
        selectedYear: new Date().getFullYear(), // Current year
        trips: [],
        showDropdown: false
      };
    },
    computed: {
      monthYear() {
        const monthIndex = this.selectedMonth - 1; // Subtract 1 to convert to zero-based index
        const monthName = new Date(this.selectedYear, monthIndex).toLocaleString('default', { month: 'long' });
        return `${monthName} ${this.selectedYear}`;
      },
      lastThreeMonths() {
        const currentMonthIndex = new Date().getMonth();
        const lastThreeMonths = [];
        for (let i = 0; i < 3; i++) {
          const monthIndex = (currentMonthIndex - i + 12) % 12 + 1; // Ensure the month index is in the range [1, 12]
          const monthName = new Date(this.selectedYear, monthIndex - 1).toLocaleString('default', { month: 'long' });
          lastThreeMonths.push(monthName);
        }
        return lastThreeMonths;
      }
    },
    mounted() {
      this.fetchTrips();
    },
    methods: {
      toggleDropdown() {
        this.showDropdown = !this.showDropdown;
      },
      fetchTrips() {
        axios.get('/trips/data', {
          params: {
            month: this.selectedMonth,
            year: this.selectedYear
          }
        })
        .then(response => {
          this.trips = response.data;
        })
        .catch(error => {
          console.error('Error fetching trips:', error);
        });
      },
      fetchTripsForMonth(monthName) {
        const monthIndex = new Date(monthName + ' 1, ' + this.selectedYear).getMonth() + 1; // Get month index from month name
        this.selectedMonth = monthIndex;
        this.fetchTrips();
      }
    }
  };
  </script>
  
  