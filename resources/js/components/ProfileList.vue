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
        <b-modal title="Modal title" v-model="fromChild" @ok="fromChild = false" centered size="sm" hide-header hide-footer>
            <div class="d-block text-center">
                <img :src="photo_url" class="img-fluid">
                <div class="mt-3 text-value">{{ name }}</div>
                <div class="text-uppercase text-muted small">{{ company }}</div>
            </div>
            <b-button class="mt-3" size="lg" block variant="danger" @click="clockOut">Clock Out</b-button>          
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
                photo_url: "/storage/0/conversions/default-thumb.jpg",
                qrcode: ''
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
            },

            clockOut() {
                this.qrcode = "type=1&uuid=" + this.profile.portuser.uuid;
                // send a post request to clock out
                axios.post('/api/portusersactive', {
                    uuid: this.profile.portuser.uuid
                })
                .then(function (response) {
                    console.log(response);
                })
                .catch(function (error) {
                    console.log(error);
                });

                // get call to get the latest listing

                console.log(this.profile.portuser.uuid);

                this.fromChild = false;

                this.reloadList();
            },

            reloadList() {
                axios.get('/api/portusersactive')
                    .then(response => {
                        this.response = response.data;
                    })               
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
