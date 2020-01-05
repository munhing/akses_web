<template>
    <div class="row"> 
        <dashboard-card :count="portuserCount" :url="urlActivePortusers" classType="portuser">Port Users</dashboard-card>
        <dashboard-card :count="vehicleCount" :url="urlActiveVehicles" classType="vehicle">Vehicles</dashboard-card>
        <dashboard-card :count="visitorCount" :url="urlActiveVisitors" classType="visitor">Visitors</dashboard-card>
        <dashboard-card :count="crewCount" :url="urlActiveCrews" classType="crew">Ship Crews</dashboard-card>
    </div>
</template>

<script>
    export default {

        data() {
            return {
                portuserCount: 0,
                vehicleCount: 0,
                visitorCount: 0,
                crewCount: 0,
                urlActivePortusers: '/activePortusers',
                urlActiveVehicles: '/activeVehicles',
                urlActiveVisitors: '/activeVisitors',
                urlActiveCrews: '/activeCrews',
                hostname: window.location.hostname
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
                    if(variable == 'crew') {
                        this.crewCount = response.data;
                    }                                                          
                });
            }
        },

        mounted() {

            this.ajaxCall('/api/getactiveportuserscount', 'portuser');
            this.ajaxCall('/api/getactivevehiclescount', 'vehicle');
            this.ajaxCall('/api/getactivevisitorscount', 'visitor');
            this.ajaxCall('/api/getactivecrewscount', 'crew');

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
                })
                 .listen('CrewClockIn', e => {
                    console.log('Crew has clock In!')
                    this.ajaxCall('/api/getactivecrewscount', 'crew');
                })
                .listen('CrewClockOut', e => {
                    console.log('Crew has clock Out!')
                    this.ajaxCall('/api/getactivecrewscount', 'crew');
                });                    
        }
    }
</script>
