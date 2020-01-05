<template>
    <b-modal title="Crew Registration" v-model="isVisible" @ok="isVisible = false" centered hide-footer>
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
            <b-form-group id="input-group-1" label="Vessel Name" label-for="vessel_name">
                <b-form-input
                    id="vessel_name"
                    v-model="form.vesselName"
                    required
                    placeholder="Vessel Name"
                ></b-form-input>
            </b-form-group>      
            <b-form-group id="input-group-1" label="Assign crew pass" label-for="pass">
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
                    vesselName: '',
                    card: []
                },
                
                cards: ['Jollibee', 'McDonalds', 'KFC', 'Sugarbun']
                
            }
        },

        methods: {

            reloadAvailableCrewPass() {
                console.log('reloading available crew pass!');
                axios.get('/api/getavailablecrewpass')
                    .then(response => {
                        this.cards = response.data;
                    });
            },

            resetForm() {
                this.form.name = '',
                this.form.nric = '',
                this.form.vesselName = '',
                this.form.card = []
            },

            submit(){
                console.log(this.form);

                // post request
                // immediately register the person into the active visitor list
                axios.post('/api/registercrew', {
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
