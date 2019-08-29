import Vue from 'vue';

require('./bootstrap');
window.Vue = require('vue');
window.axios = axios;

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('all-post', require('./components/AllPosts.vue').default);
Vue.component('category-list', require('./components/Categories.vue').default);
Vue.component('edit-post', require('./components/Edit.vue').default);

const app = new Vue({
    el: '#app',
});
