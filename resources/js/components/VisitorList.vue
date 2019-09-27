<template>
    <div class="row"> 
        <visitor-card 
            v-for="vl in getVisitors"
            :key="vl.visitor.id"
            :name="vl.visitor.name"               
            :company="vl.visitor.company"
            :nric="vl.visitor.nric"
            :cardDescription="vl.card.description"
            @visitorClicked="onVisitorClick"
        ></visitor-card>
        <b-modal title="Modal title" v-model="fromChild" @ok="fromChild = false" centered size="sm" hide-header hide-footer>
            <div class="d-block text-center">
                <div class="text-value">{{ cardDescription }}</div>
                <hr>
                <div class="text-value">{{ name }}</div>
                <div class="text-muted">{{ nric }}</div>     
                <div class="text-uppercase text-muted small">{{ company }}</div>
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
                visitor: [],
                name: "",
                company: "",
                nric: "",
                cardDescription: "",
            }; 
        },

        computed: {
            getVisitors() {
                return this.$root.filteredVisitors;
            } 
        },

        methods: {
            onVisitorClick(value) {
                this.fromChild = true;
                this.visitor = this.getVisitor(value);
                
                this.name = this.visitor.visitor.name;
                this.company = this.visitor.visitor.company;
                this.nric = this.visitor.visitor.nric;
                this.cardDescription = this.visitor.card.description;
                console.log('onVisitorClick method: ' + this.name);
            },

            getVisitor(id) {

                let visitor;

                this.$root.visitors.forEach(function(item){
                    if (id == item.visitor.id) {
                        visitor = item;
                    }
                });

                return visitor;
            },  
            
            clockOut() {
                // this.qrcode = "type=1&uuid=" + this.profile.portuser.uuid;
                // send a post request to clock out
                let id = this.visitor.visitor.id;

                console.log('uuid is: ' + this.visitor.card.uuid);
                axios.delete('/api/activevisitors', {
                    data: {uuid: this.visitor.card.uuid}
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

                console.log(this.visitor.card.uuid);

                this.fromChild = false;

                // this.reloadList();
            }, 
            
            removeVisitor(id) {

                let i;
                let index;

                for (i=0; i < this.$root.visitors.length; i++) {
                    if (id == this.$root.visitors[i].visitor.id) {
                        index = i;
                    }
                }

                console.log('Visitor index is ' + index);
                this.$delete(this.$root.visitors, index);

            },            
        },

        mounted() {
            // fetch data from database
            console.log('Visitor List Component mounted.')
            console.log(window.location.hostname);
            axios.get('/api/activevisitors')
                .then(response => {
                    this.$root.visitors = response.data;
                });

            window.Echo.channel('clocking').listen('VisitorClockOut', e => {

                // this.$root.profiles = [];
                // this.makeToast(); // Not working
                this.$root.reloadVisitorList();
                console.log('Visitor has clock out!')
                console.log(e);
            });

            window.Echo.channel('clocking').listen('VisitorClockIn', e => {

                // this.$root.profiles = [];
                // this.makeToast(); // Not working
                this.$root.reloadVisitorList();
                console.log('Visitor has clock In!')
                console.log(e);
            });                
        }
    }
</script>
