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
                console.log('Portuser with uuid: '+ this.form.uuid +' clock in!');
                // make an ajax call to clock in a port user
            }
        }
    }
</script>
