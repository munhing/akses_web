<template>
    <div class="col-xs-4 col-sm-3 col-lg-2">
        <div class="brand-card">
            <div class="brand-card-body">
                <div>
                    <div class="text-value">
                        <a href="#" @click="emit">
                            {{ plateNo }}
                        </a>
                    </div>
                    <div class="text-uppercase text-muted small">{{ company }}</div>
                    <div class="text-muted">{{ type }}</div>
                </div>

            </div>
        </div> 
    </div>  
</template>

<script>
    export default {

        props: ['plateNo', 'company', 'type'],

        methods: {
            emit(event) {
                this.$emit('vehicleClicked', this.$vnode.key);
            }
        },

        mounted() {
            console.log('VehicleCard mounted.')
        }
    }
</script>
