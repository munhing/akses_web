<template>
    <div class="col-sm-3 col-lg-2">
        <div class="brand-card">
            <div class="profile-card-header">

                <div class="chart-wrapper">
                    <img :src="getPhotoUrl" class="img-fluid">
                </div>

            </div>
            <div class="brand-card-body">
                <div>
                    <div class="text-value">{{ name }}</div>
                    <div class="text-uppercase text-muted small">{{ company }}</div>
                </div>

            </div>
        </div> 
    </div>  
</template>

<script>
    export default {

        props: ['media', 'name', 'company'],

        computed: {
            getPhotoUrl() {
                if (! Array.isArray(this.media) || ! this.media.length) {
                    // array does not exist, is not an array, or is empty
                    // return default value;
                    return "/storage/0/conversions/default-thumb.jpg";
                }

                console.log(this.media[0].url_thumb);
                return this.media[0].url_thumb;
            }
        },

        mounted() {
            console.log('ProfileCard mounted.')
        }
    }
</script>
