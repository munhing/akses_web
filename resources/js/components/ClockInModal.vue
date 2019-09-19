<template>
    <b-modal title="Modal title" v-model="isVisible" @ok="isVisible = false" centered size="sm" hide-header hide-footer>
        <b-form @submit="clockIn">
            <b-form-group id="input-group-1" label="Uuid" label-for="uuid">
                <b-form-input
                    id="uuid"
                    v-model="form.uuid"
                    required
                    placeholder="Enter portuser uuid"
                ></b-form-input>
            </b-form-group>
            <b-button class="mt-3" size="lg" block type="submit" variant="success">Clock In</b-button>   
        </b-form>       
    </b-modal>
</template>

<script>
    export default {

        data() {
            return {
                isVisible: false,
                form: {
                    uuid: ''
                }
            }
        },

        methods: {
            clockIn(e) {
                e.preventDefault();
                // make an ajax call to clock in a port user

                // send a post request to clock In
                axios.post('/api/portusersactive', {
                    uuid: this.form.uuid
                })
                .then((response) => {
                    console.log(response);
                    this.$root.reloadList();
                })
                .catch(function (error) {
                    console.log(error);
                });
                // this.removeProfile(id);
                // get call to get the latest listing

                console.log('Portuser with uuid: '+ this.form.uuid +' clock in!');

                this.isVisible = false;                
            }
        }
    }
</script>
