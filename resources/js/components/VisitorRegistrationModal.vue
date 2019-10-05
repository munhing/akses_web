<template>
    <b-modal title="Visitor Registration" v-model="isVisible" @ok="isVisible = false" centered hide-footer>
        <b-form @submit.prevent="submit">
            <b-form-group id="input-group-1" label="Name" label-for="name">
                <b-form-input
                    id="name"
                    v-model="form.name"
                    required
                    placeholder="Enter name"
                ></b-form-input>
            </b-form-group>
            <b-form-group id="input-group-1" label="NRIC" label-for="nric">
                <b-form-input
                    id="nric"
                    v-model="form.nric"
                    required
                    placeholder="IC or Passport Number"
                ></b-form-input>
            </b-form-group>   
            <b-form-group id="input-group-1" label="Company" label-for="company">
                <b-form-input
                    id="company"
                    v-model="form.company"
                    required
                    placeholder="Company"
                ></b-form-input>
            </b-form-group>   
            <b-form-group id="input-group-1" label="Reason for visit" label-for="reason">
                <b-form-textarea
                    id="reason"
                    v-model="form.reason"
                    placeholder="Reason to visit"
                    rows="3"
                    max-rows="6"
                ></b-form-textarea>
            </b-form-group>     
            <b-form-group id="input-group-1" label="Assign visitior pass" label-for="pass">
                <v-select 
                    id="card" 
                    v-model="form.card" 
                    multiple 
                    :options="cards" 
                    :reduce="description => description.uuid"
                    label="description"
                ></v-select>
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
                    name: '',
                    nric: '',
                    company: '',
                    reason: '',
                    card: []
                },
                
                cards: ['Jollibee', 'McDonalds', 'KFC', 'Sugarbun']
                
            }
        },

        methods: {

            reloadAvailableVisitorPass() {
                console.log('reloading available visitor pass!');
                axios.get('/api/getavailablevisitorpass')
                    .then(response => {
                        this.cards = response.data;
                    });
            },

            resetForm() {
                this.form.name = '',
                this.form.nric = '',
                this.form.company = '',
                this.form.reason = '',
                this.form.card = []
            },

            submit(){
                console.log(this.form);

                // post request
                // immediately register the person into the active visitor list
                axios.post('/api/registervisitor', {
                    form: this.form
                })
                .then((response) => {
                    console.log(response);
                    // reset the form
                    this.resetForm();
                    // close the modal
                    this.isVisible = false;
                })
                .catch(function (error) {
                    console.log(error.response.data.message);
                    alert(error.response.data.message);
                });
            },            

        }
        
    }
</script>
