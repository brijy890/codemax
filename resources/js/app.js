/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';

Vue.use(VueRouter);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('topnav', require('./components/Topnav.vue').default);
let InventoryTable = require('./components/InventoryTable.vue').default;
let CreateManufacturer = require('./components/CreateManufacturer.vue').default;
let CreateCarModel = require('./components/CreateCarModel.vue').default;

const routes = [
  { path: '/', component: InventoryTable },
  {path: '/create-manufacturer', component: CreateManufacturer},
  {path: '/create-car-model', component: CreateCarModel},
  {path: '/', redirect: '/'}
]

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
const router = new VueRouter({
  mode: 'history',
  routes // short for `routes: routes`
})

const app = new Vue({
    el: '#app',
    router
});

export default router;
