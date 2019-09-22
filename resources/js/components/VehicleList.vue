<template>
    <div class="row"> 
        <vehicle-card 
            v-for="vl in getVehicles"
            :key="vl.vehicle.id"
            :plateNo="vl.vehicle.plate_no"               
            :company="vl.vehicle.company.name"
            :type="vl.vehicle.type.type"
            @vehicleClicked="onVehicleClick"
        ></vehicle-card>
        <b-modal title="Modal title" v-model="fromChild" @ok="fromChild = false" centered size="sm" hide-header hide-footer>
            <div class="d-block text-center">
                <div class="text-value">{{ plateNo }}</div>
                <div class="text-uppercase text-muted small">{{ company }}</div>
                <div class="text-muted">{{ type }}</div>     
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
                vehicle: [],
                plateNo: "",
                company: "",
                type: "",
            }; 
        },

        computed: {
            getVehicles() {
                return this.$root.filteredVehicles;
            } 
        },

        methods: {
            onVehicleClick(value) {
                this.fromChild = true;
                this.vehicle = this.getVehicle(value);
                
                this.plateNo = this.vehicle.vehicle.plate_no;
                this.company = this.vehicle.vehicle.company.name;
                this.type = this.vehicle.vehicle.type.type;
                console.log('onVehicleClick method: ' + this.plateNo);
            },

            getVehicle(id) {

                let vehicle;

                this.$root.vehicles.forEach(function(item){
                    if (id == item.vehicle.id) {
                        vehicle = item;
                    }
                });

                return vehicle;
            },  
            
            clockOut() {
                // this.qrcode = "type=1&uuid=" + this.profile.portuser.uuid;
                // send a post request to clock out
                let id = this.vehicle.vehicle.id;

                console.log('uuid is: ' + this.vehicle.vehicle.uuid);
                axios.delete('/api/activevehicles', {
                    data: {uuid: this.vehicle.vehicle.uuid}
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

                console.log(this.vehicle.vehicle.uuid);

                this.fromChild = false;

                // this.reloadList();
            }, 
            
            removeVehicle(id) {

                let i;
                let index;

                for (i=0; i < this.$root.vehicles.length; i++) {
                    if (id == this.$root.vehicles[i].vehicle.id) {
                        index = i;
                    }
                }

                console.log('Vehicle index is ' + index);
                this.$delete(this.$root.vehicles, index);

            },            
        },

        mounted() {
            // fetch data from database
            console.log('Vehicle List Component mounted.')
            console.log(window.location.hostname);
            axios.get('/api/activevehicles')
                .then(response => {
                    this.$root.vehicles = response.data;
                });

            window.Echo.channel('clocking').listen('VehicleClockOut', e => {

                // this.$root.profiles = [];
                // this.makeToast(); // Not working
                this.$root.reloadVehicleList();
                console.log('Vehicle has clock out!')
                console.log(e);
            });

            window.Echo.channel('clocking').listen('VehicleClockIn', e => {

                // this.$root.profiles = [];
                // this.makeToast(); // Not working
                this.$root.reloadVehicleList();
                console.log('Vehicle has clock In!')
                console.log(e);
            });                
        }
    }
</script>
