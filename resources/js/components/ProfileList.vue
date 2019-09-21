<template>
    <div class="row"> 
        <profile-card 
            v-for="pl in getProfiles"
            :key="pl.portuser.id"
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
                fromChild: false,
                profile: [],
                name: "",
                company: "",
                photo_url: "/storage/0/conversions/default-thumb.jpg",
                qrcode: ''
            }; 
        },

        computed: {
            getProfiles() {
                return this.$root.filteredProfiles;
            } 
        },

        methods: {
            onProfileClick(value) {
                this.fromChild = true;
                this.profile = this.getProfile(value);
                
                console.log('Profile ' + value +' was clicked!');
                console.log(this.profile);

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

                // console.log(this.profile.portuser.media[0].url_thumb);
                return this.profile.portuser.media[0].url_thumb;
            },

            clockOut() {
                this.qrcode = "type=1&uuid=" + this.profile.portuser.uuid;
                // send a post request to clock out
                let id = this.profile.portuser.id;

                console.log('uuid is: ' + this.profile.portuser.uuid);
                axios.delete('/api/portusersactive', {
                    data: {uuid: this.profile.portuser.uuid}
                })
                .then((response) => {
                    console.log(response);
                    this.removeProfile(id);
                })
                .catch(function (error) {
                    console.log(error);
                });
                // this.removeProfile(id);
                // get call to get the latest listing

                console.log(this.profile.portuser.uuid);

                this.fromChild = false;

                // this.reloadList();
            },

            getProfile(id) {

                let profile;

                this.$root.profiles.forEach(function(item){
                    if (id == item.portuser.id) {
                        profile = item;
                    }
                });

                return profile;

            },

            removeProfile(id) {

                let i;
                let index;

                for (i=0; i < this.$root.profiles.length; i++) {
                    if (id == this.$root.profiles[i].portuser.id) {
                        index = i;
                    }
                }

                console.log('index is ' + index);
                this.$delete(this.$root.profiles, index);

            },

            makeToast(append = false) {
                // this method not working
                this.$bvToast.toast(`Portuser clocks out!`, {
                title: 'Clocking',
                autoHideDelay: 5000,
                appendToast: append
                })
            }
        },

        mounted() {
            // fetch data from database
            console.log('Component mounted.')
            console.log(window.location.hostname);
            axios.get('http://llpm.dlinkddns.com:8084/api/portusersactive')
                .then(response => {
                    this.$root.profiles = response.data;
                });

            window.Echo.channel('clocking').listen('ClockOut', e => {

                // this.$root.profiles = [];
                // this.makeToast(); // Not working
                this.$root.reloadList();
                console.log('Portuser has clock out!')
                console.log(e);
            });

            window.Echo.channel('clocking').listen('ClockIn', e => {

                // this.$root.profiles = [];
                // this.makeToast(); // Not working
                this.$root.reloadList();
                console.log('Portuser has clock In!')
                console.log(e);
            });
        }
    }
</script>
