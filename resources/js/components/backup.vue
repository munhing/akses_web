<template>
    <b-modal title="Modal title" v-model="isVisible" @ok="isVisible = false" centered size="sm" hide-header hide-footer>
        <b-form @submit="submit">
            <b-form-group id="input-group-1" label="Name" label-for="name">
                <b-form-input
                    id="name"
                    v-model="form.name"
                    required
                    placeholder="Enter name"
                ></b-form-input>
            </b-form-group>
            <b-button class="mt-3" size="lg" block type="submit" variant="success">Register</b-button>   
        </b-form>       
    </b-modal>
</template>

<script>
    export default {

        data() {
            return {
                isVisible: false,
                form: {
                    name: ''
                }
            }
        },

        methods: {
            submit(){
                console.log('Submit button');
            }
        }
        
    }
