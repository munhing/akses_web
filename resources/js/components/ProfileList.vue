<template>
    <div class="row"> 
        <profile-card 
            v-for="(pl, index) in response"
            :key="index"
            :media="pl.portuser.media"               
            :name="pl.portuser.name"               
            :company="pl.portuser.company.name"
            @profileClicked="onProfileClick"
        ></profile-card>
        <b-modal title="Modal title" v-model="fromChild" @ok="fromChild = false">
            <div class="brand-card">
                <div class="profile-card-header">

                    <div class="chart-wrapper">
                        <img :src="photo_url" class="img-fluid">
                    </div>

                </div>
                <div class="brand-card-body">
                    <div>
                        <div class="text-value">
                                {{ name }}
                        </div>
                        <div class="text-uppercase text-muted small">{{ company }}</div>
                    </div>

                </div>
            </div>             
        </b-modal>
    </div>
</template>

<script>
    export default {

        data() {
            return {
                response: [],
                fromChild: false,
                profile: [],
                name: "",
                company: "",
                photo_url: "/storage/0/conversions/default-thumb.jpg"
            }; 
        },

        methods: {
            onProfileClick(value) {
                this.fromChild = true;
                this.profile = this.response[value];
                console.log('Profile ' + value +' was clicked!');
                console.log(this.response[value]);

                this.name = this.profile.portuser.name;
                this.company = this.profile.portuser.company.name;
                this.photo_url = this.getPhotoUrl();
                console.log('onProfileClick method: ' + this.getPhotoUrl());
            },

            getPhotoUrl() {

                if (! Array.isArray(this.profile.portuser.media) || ! this.profile.portuser.media.length) {
                    // array does not exist, is not an array, or is empty
                    // return default value;
                    return "/storage/0/conversions/default-thumb.jpg";
                }

                console.log(this.profile.portuser.media[0].url_thumb);
                return this.profile.portuser.media[0].url_thumb;
            }

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
