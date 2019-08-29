import Vue from 'vue';

require('./bootstrap');
window.Vue = require('vue');
window.axios = axios;

import VueRouter from 'vue-router';
window.Vue.use(VueRouter);

// import AllPost from './components/AllPosts'
// import Edit from './components/Edit'
// import Category from './components/Categories';


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('all-post', require('./components/AllPosts.vue').default);
Vue.component('category-list', require('./components/Categories.vue').default);
Vue.component('edit-post', require('./components/Edit.vue').default);




const routes = [
    // {
    //     name:'allpost',
    //     path: '/',
    //     component: AllPost
    // },
    // {
    //     name:'edit',
    //     path:'/edit/:id',
    //     component: Edit
    // },
    // {
    //     name:'category',
    //     path:'/category',
    //     component: Category
    // }
]

const router = new VueRouter({routes})
const app = new Vue({
    router
}).$mount('#app');

// const app = new Vue({
//     el: '#app',
// });