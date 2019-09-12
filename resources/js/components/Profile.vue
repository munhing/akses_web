<template>

    <div class="brand-card">
        <div class="profile-card-header">

            <div class="chart-wrapper">
                <img :src="photo_url" class="img-fluid">
            </div>

        </div>
        <div class="brand-card-body">
            <div>
                <div class="text-value">{{ name }}</div>
                <div class="text-uppercase text-muted small">{{ company }}</div>
            </div>

        </div>
        <div>
            <ul>
                <li 
                    v-for="portuser in portusers"
                    v-bind:key="portuser.id"
                    v-text="portuser.portuser_uuid"
                ></li>
            </ul>
        </div>
    </div>   
</template>

<script>
    export default {

        data() {
            return { portusers: [] };
        },

        props: ['photo_url', 'name', 'company'],

        mounted() {
            // fetch data from database
            console.log('Component mounted.')
            axios.get('http://akses.test/api/portusersactive')
                .then(response => {
                    this.portusers = response.data
                })
        }
    }
</script>
