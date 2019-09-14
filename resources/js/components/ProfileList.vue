<template>
    <div class="row"> 
        <profile-card 
            v-for="pl in response"
            v-bind:key="pl.id"
            v-bind:media="pl.portuser.media"               
            v-bind:name="pl.portuser.name"               
            v-bind:company="pl.portuser.company.name"               
        ></profile-card>
    </div>
</template>

<script>
    export default {

        data() {
            return {
                response: []
            }; 
        },

        mounted() {
            // fetch data from database
            console.log('Component mounted.')
            console.log(location.hostname);
            axios.get('/api/portusersactive')
                .then(response => {
                    this.response = response.data;
                })
        }
    }
</script>
