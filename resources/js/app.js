/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import BootstrapVue from 'bootstrap-vue' //Importing
import vSelect from 'vue-select'

import 'vue-select/dist/vue-select.css';
import AnimatedNumber from "animated-number-vue";

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

Vue.component('vehicle-list', require('./components/VehicleList.vue').default);
Vue.component('vehicle-card', require('./components/VehicleCard.vue').default);
Vue.component('vehicle-clock-in-modal', require('./components/VehicleClockInModal.vue').default);

Vue.component('visitor-list', require('./components/VisitorList.vue').default);
Vue.component('visitor-card', require('./components/VisitorCard.vue').default);
Vue.component('visitor-clock-in-modal', require('./components/VisitorClockInModal.vue').default);



Vue.component('v-select', vSelect);
Vue.component('animated-number', AnimatedNumber);

Vue.component('visitor-registration-modal', require('./components/VisitorRegistrationModal.vue').default);

Vue.component('dashboard', require('./components/Dashboard.vue').default);
Vue.component('dashboard-card', require('./components/DashboardCard.vue').default);
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
        vehicles: [],
        visitors: [],
        search: '',
        options: ['foo', 'bar', 'baz']
    },

    computed: {
        filteredProfiles() {
            return this.profiles.filter(profile => {
                return (profile.portuser.name.toLowerCase().indexOf(this.search.toLowerCase()) !== -1) || (profile.portuser.company.name.toLowerCase().indexOf(this.search.toLowerCase()) !== -1);
            });
        },

        filteredVehicles() {
            return this.vehicles.filter(vehicle => {
                return (vehicle.vehicle.plate_no.toLowerCase().indexOf(this.search.toLowerCase()) !== -1) || (vehicle.vehicle.company.name.toLowerCase().indexOf(this.search.toLowerCase()) !== -1) || (vehicle.vehicle.type.type.toLowerCase().indexOf(this.search.toLowerCase()) !== -1);
            });
        },
        
        filteredVisitors() {
            return this.visitors.filter(visitor => {
                return (visitor.card.description.toLowerCase().indexOf(this.search.toLowerCase()) !== -1) || (visitor.visitor.name.toLowerCase().indexOf(this.search.toLowerCase()) !== -1) || (visitor.visitor.company.toLowerCase().indexOf(this.search.toLowerCase()) !== -1) || (visitor.visitor.nric.toLowerCase().indexOf(this.search.toLowerCase()) !== -1);
            });           
        }
    },

    methods: {
        
        clockInModal() {
            console.log('Clock In button was pressed!');
            this.$refs.myModal.isVisible = true;
        },

        vehicleClockInModal() {
            console.log('Vehicle Clock In button was pressed!');
            this.$refs.myVehicleModal.isVisible = true;
        },

        visitorClockInModal() {
            console.log('Visitor Clock In button was pressed!');
            this.$refs.myVisitorModal.isVisible = true;
        },

        visitorRegistrationModal() {
            console.log('Visitor Registration button was pressed!');
            this.$refs.myVisitorRegistrationModal.isVisible = true;
            this.$refs.myVisitorRegistrationModal.reloadAvailableVisitorPass();
        },

        reloadList() {

            axios.get('/api/activeportusers')
                .then(response => {
                    this.profiles = response.data;
                });
        }, 
        
        reloadVehicleList() {

            axios.get('/api/activevehicles')
                .then(response => {
                    this.vehicles = response.data;
                });
        },      

        reloadVisitorList() {

            axios.get('/api/activevisitors')
                .then(response => {
                    this.visitors = response.data;
                });
        },              
    }
});

const header = new Vue({
    el: '#navbar',
   
    data: {
        msg: 'Header Vue Component'
    },

    methods: {
        visitorRegistrationModal() {
            console.log('Visitor Registration button was pressed!');
            this.$refs.myVisitorRegistrationModal.isVisible = true;
            this.$refs.myVisitorRegistrationModal.reloadAvailableVisitorPass();
        },
    }
});