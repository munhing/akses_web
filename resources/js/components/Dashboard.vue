<template>
    <div class="row"> 
        <dashboard-card :count="portuserCount" classType="portuser">Port Users</dashboard-card>
        <dashboard-card :count="vehicleCount" classType="vehicle">Vehicles</dashboard-card>
        <dashboard-card :count="visitorCount" classType="visitor">Visitors</dashboard-card>
    </div>
</template>

<script>
    export default {

        data() {
            return {
                portuserCount: 0,
                vehicleCount: 0,
                visitorCount: 0,

            }; 
        },

        methods: {
            ajaxCall(url, variable){

                axios.get(url)
                .then(response => {
                    console.log(response.data);
                    if(variable == 'portuser') {
                        this.portuserCount = response.data;
                    }
                    if(variable == 'vehicle') {
                        this.vehicleCount = response.data;
                    }
                    if(variable == 'visitor') {
                        this.visitorCount = response.data;
                    }                                        
                });
            }
        },

        mounted() {

            this.ajaxCall('/api/getactiveportuserscount', 'portuser');
            this.ajaxCall('/api/getactivevehiclescount', 'vehicle');
            this.ajaxCall('/api/getactivevisitorscount', 'visitor');

            window.Echo.channel('clocking')
                .listen('ClockIn', e => {
                    console.log('Portuser has clock In!')
                    this.ajaxCall('/api/getactiveportuserscount', 'portuser');
                })
                .listen('ClockOut', e => {
                    console.log('Portuser has clock Out!')
                    this.ajaxCall('/api/getactiveportuserscount', 'portuser');
                })
                .listen('VehicleClockIn', e => {
                    console.log('Vehicle has clock In!')
                    this.ajaxCall('/api/getactivevehiclescount', 'vehicle');
                })
                .listen('VehicleClockOut', e => {
                    console.log('Vehicle has clock Out!')
                    this.ajaxCall('/api/getactivevehiclescount', 'vehicle');
                })
                 .listen('VisitorClockIn', e => {
                    console.log('Visitor has clock In!')
                    this.ajaxCall('/api/getactivevisitorscount', 'visitor');
                })
                .listen('VisitorClockOut', e => {
                    console.log('Visitor has clock Out!')
                    this.ajaxCall('/api/getactivevisitorscount', 'visitor');
                });    
        }
    }
</script>
