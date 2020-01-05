<template>
    <div class="row"> 
        <crew-card 
            v-for="cl in getCrews"
            :key="cl.card.id"
            :name="cl.crew.name"               
            :vesselName="cl.crew.vesselName"
            :nric="cl.crew.nric"
            :cardDescription="cl.card.description"
            @crewClicked="onCrewClick"
        ></crew-card>
        <b-modal title="Modal title" v-model="fromChild" @ok="fromChild = false" centered size="sm" hide-header hide-footer>
            <div class="d-block text-center">
                <div class="text-value">{{ cardDescription }}</div>
                <hr>
                <div class="text-value">{{ name }}</div>
                <div class="text-muted">{{ nric }}</div>     
                <div class="text-uppercase text-muted small">{{ vesselName }}</div>
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
                crew: [],
                name: "",
                vesselName: "",
                nric: "",
                cardDescription: "",
            }; 
        },

        computed: {
            getCrews() {
                return this.$root.filteredCrews;
            } 
        },

        methods: {
            onCrewClick(value) {
                this.fromChild = true;
                this.crew = this.getCrew(value);
                
                this.name = this.crew.crew.name;
                this.vesselName = this.crew.crew.vessel_name;
                this.nric = this.crew.crew.nric;
                this.cardDescription = this.crew.card.description;
                console.log('onCrewClick method: ' + this.name);
            },

            getCrew(id) {

                let crew;

                this.$root.crews.forEach(function(item){
                    if (id == item.card.id) {
                        crew = item;
                    }
                });

                return crew;
            },  
            
            clockOut() {
                // this.qrcode = "type=1&uuid=" + this.profile.portuser.uuid;
                // send a post request to clock out
                let id = this.crew.crew.id;

                console.log('uuid is: ' + this.crew.card.uuid);
                axios.delete('/api/activecrews', {
                    data: {uuid: this.crew.card.uuid}
                })
                .then((response) => {
                    console.log(response);
                    // this.removeProfile(id);
                })
                .catch(function (error) {
                    console.log(error);
                });
                // this.removeProfile(id);
                // get call to get the latest listing

                console.log('card uuid: ' + this.crew.card.uuid);
                console.log('crew uuid: ' + this.crew.crew.uuid);

                this.fromChild = false;

                // this.reloadList();
            }, 
            
            removeCrew(id) {

                let i;
                let index;

                for (i=0; i < this.$root.crews.length; i++) {
                    if (id == this.$root.crews[i].crew.id) {
                        index = i;
                    }
                }

                console.log('Crew index is ' + index);
                this.$delete(this.$root.crews, index);

            },            
        },

        mounted() {
            // fetch data from database
            console.log('Crew List Component mounted.')
            console.log(window.location.hostname);
            axios.get('/api/activecrews')
                .then(response => {
                    this.$root.crews = response.data;
                    // console.log(response.data);
                });

            window.Echo.channel('clocking').listen('CrewClockOut', e => {

                // this.$root.profiles = [];
                // this.makeToast(); // Not working
                this.$root.reloadCrewList();
                console.log('Crew has clock out!')
                console.log(e);
            });

            window.Echo.channel('clocking').listen('CrewClockIn', e => {

                // this.$root.profiles = [];
                // this.makeToast(); // Not working
                this.$root.reloadCrewList();
                console.log('Crew has clock In!')
                console.log(e);
            });                
        }
    }
</script>
