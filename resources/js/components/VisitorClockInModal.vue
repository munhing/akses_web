<template>
    <b-modal title="Modal title" v-model="isVisible" @ok="isVisible = false" centered size="sm" hide-header hide-footer>
        <b-form @submit="clockIn">
            <b-form-group id="input-group-1" label="Visitor Card Uuid" label-for="visitor_card_uuid">
                <b-form-input
                    id="visitor_card_uuid"
                    v-model="form.visitorCardUuid"
                    required
                    placeholder="Enter Visitor Card Uuid"
                ></b-form-input>
            </b-form-group>

            <b-form-group id="input-group-1" label="Visitor Uuid" label-for="visitor_uuid">
                <b-form-input
                    id="visitor_uuid"
                    v-model="form.visitorUuid"
                    required
                    placeholder="Enter Visitor Uuid"
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
                    visitorCardUuid: '',
                    visitorUuid: ''
                }
            }
        },

        methods: {
            clockIn(e) {
                e.preventDefault();
                // make an ajax call to clock in a port user

                // send a post request to clock In
                axios.post('/api/activevisitors', {
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

                console.log('Visitor with card uuid: '+ this.form.visitor_card_uuid +' clock in!');

                this.isVisible = false;                
            }
        }
    }
</script>
