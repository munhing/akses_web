<template>
    <b-form-group id="input-group-1" label="Company:" label-for="company_id">
        <v-select 
            ref="myselect"
            id="company_id" 
            v-model="selected" 
            :options="options" 
            :reduce="option => option.id"
            label="name"
            @input="updateId"
            selectOnTab
        ></v-select>
        <input type="hidden" id="company_id" name="company_id" v-model="companyId" required>
    </b-form-group>                                         
</template>

<script>
    export default {
        props: ['defaultId'],

        data() {
            return {
                options: [],
                selected: '',
                companyId: ''
            }
        },

        methods: {

            getOption(id) {

                let option;

                this.options.forEach(function(opt){
                    if(opt.id == id) {
                        option = opt;
                    }
                });

                return option;

            },

            updateId(val) {
                console.log(val);
                this.companyId = val;
            }
        },

        mounted() {
            console.log(this.defaultId);

            axios.get('/api/getcompanies')
                .then(response => {
                    this.options = response.data;
                    if(this.defaultId != null) {
                        this.selected = this.getOption(this.defaultId);
                        this.updateId(this.defaultId);
                        // console.log(this.defaultId);
                        // console.log(this.selected);
                    }
                });
        }      
    }
</script>
