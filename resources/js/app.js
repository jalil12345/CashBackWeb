/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
window.EventBus = new Vue();




Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('store-search', require('./components/StoreSearch.vue').default);
Vue.component('search', require('./components/Search.vue').default);
Vue.component('favorite', require('./components/favorite.vue').default);
// Vue.component('trip-component', require('./components/TripComponent.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app0',
});
const app1 = new Vue({
    el: '#app1',
});
const app3 = new Vue({
    el: '#app3',
});
// const app4 = new Vue({
//     el: '#app4',
// });

