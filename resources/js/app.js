/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import BootstrapVue from 'bootstrap-vue' //Importing

Vue.use(BootstrapVue) // Telling Vue to use this in whole application

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('profile-list', require('./components/ProfileList.vue').default);
Vue.component('profile-card', require('./components/ProfileCard.vue').default);
Vue.component('clock-in-modal', require('./components/ClockInModal.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// let store = {
//     profiles: []
// };


const app = new Vue({
    el: '#app',

    data: {
        profiles: [],
        search: ''
    },

    computed: {
        filteredProfiles() {
            return this.profiles.filter(profile => {
                return (profile.portuser.name.toLowerCase().indexOf(this.search.toLowerCase()) !== -1) || (profile.portuser.company.name.toLowerCase().indexOf(this.search.toLowerCase()) !== -1);
            });
        }
    },

    methods: {
        
        clockInModal() {
            console.log('Clock In button was pressed!');
            this.$refs.myModal.isVisible = true;
        },

        reloadList() {

            axios.get('http://llpm.dlinkddns.com:8084/api/portusersactive')
                .then(response => {
                    this.profiles = response.data;
                });

        },        
    }
});
