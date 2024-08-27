<template>
    <div class="mb-3 position-relative">
        <label for="storeWebsite" class="form-label">Store or Brand Name</label>
        <input 
            type="text" 
            class="form-control" 
            id="storeWebsite" 
            name="store_website" 
            placeholder="Store or Brand Name" 
            required 
            @input="onInput"
            @blur="validateInput"
        >
        <ul class="dropdown-menu dropdown-menu-width rounded-start show" v-if="filteredStores.length">
            <li class="h6 ms-1 fw-bold">Stores</li>
            <a v-for="(store, index) in filteredStores" :key="store.name" style="text-decoration: none;" 
                class="text-dark" @click="selectStore(store.name)" href="#">
                <span class="dropdown-item">
                    <span v-html="getHighlightedText(store.name)"> </span>
                </span>
            </a>
        </ul>
        <p v-if="invalidInput" class="text-danger">Please select a valid store from the list.</p>
    </div>
</template>

<script>
export default {
    data() {
        return {
            stores: [],
            filteredStores: [],
            query: '',
            invalidInput: false
        };
    },
    created() {
        this.fetchStores();
    },
    methods: {
        fetchStores() {
            fetch('api/2/companies')
                .then(response => response.json())
                .then(data => {
                    this.stores = data;
                });
        },
        onInput(event) {
            this.query = event.target.value;
            if (this.query.length > 0) {
                this.filteredStores = this.stores.filter(store => 
                    store.name.toLowerCase().includes(this.query.toLowerCase())
                ).slice(0, 5); // Limit to 5 results
            } else {
                this.filteredStores = [];
            }
        },
        getHighlightedText(text) {
            const query = this.query;
            if (!query) return text;
            const parts = text.split(new RegExp(`(${query})`, 'gi'));
            return parts.map(part => part.toLowerCase() === query.toLowerCase() ? `<b>${part}</b>` : part).join('');
        },
        selectStore(name) {
            this.query = name;
            this.filteredStores = [];
            document.getElementById('storeWebsite').value = name;
            this.invalidInput = false; // Reset the invalid input flag
        },
        validateInput() {
            if (!this.stores.some(store => store.name === this.query)) {
                this.invalidInput = true;
            } else {
                this.invalidInput = false;
            }
        }
    }
};
</script>

<style scoped>
.position-relative {
    position: relative;
}

.dropdown-menu-width {
    width: 100%;
}

.text-danger {
    font-size: 0.875rem;
    margin-top: 0.5rem;
}
</style>
