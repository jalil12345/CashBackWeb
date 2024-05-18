<!-- BackToTopButton.vue -->

<script>
export default {
    methods: {
        scrollToTop() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        },
        handleScroll() {
            const backToTopButton = document.getElementById('back-to-top');
            if (window.scrollY > 300) {
                backToTopButton.style.display = 'block';
            } else {
                backToTopButton.style.display = 'none';
            }
        }
    },
    mounted() {
        window.addEventListener('scroll', this.handleScroll);
    },
    destroyed() {
        window.removeEventListener('scroll', this.handleScroll);
    }
}
</script>
<template>
    <div id="back-to-top" class="position-fixed bottom-0 end-0 p-3" style="display: none;">
        <button class="btn btn-primary" @click="scrollToTop" title="Back to Top">
            <i class="fas fa-arrow-up"></i>
        </button>
    </div>
</template>
<style scoped>
/* Add any custom styling here */
</style>
