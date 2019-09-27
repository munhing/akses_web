<template>
    <div class="col-xs-4 col-sm-3 col-lg-2">
        <div class="brand-card pad1">
            <div class="profile-card-header align-center">

                <div class="chart-wrapper">
                
                    <div class="text-value">
                            {{ cardDescription }}
                    </div> 
                </div>               

            </div>     
            <div class="brand-card-body">
                
                <div>
                    <div class="text-value">
                        <a href="#" @click="emit">
                            {{ name }}
                        </a>
                    </div>
                    <div class="text-uppercase text-muted small">{{ company }}</div>
                    <div class="text-muted">{{ nric }}</div>
                </div>

            </div>
        </div> 
    </div>  
</template>

<script>
    export default {

        props: ['name', 'company', 'nric', 'cardDescription'],

        methods: {
            emit(event) {
                this.$emit('visitorClicked', this.$vnode.key);
            }
        },

        mounted() {
            console.log('VisitorCard mounted.')
        }
    }
</script>
