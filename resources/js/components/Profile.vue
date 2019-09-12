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
    </div>    
</template>

<script>
    export default {

        props: ['photo_url', 'name', 'company'],

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
