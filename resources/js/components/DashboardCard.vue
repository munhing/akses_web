<template>
    <div class="col-sm-6 col-lg-3">
        <div class="card text-white" v-bind:class="applyClassType">
            <div class="card-body pb-0">
                <div class="text-value larger">
                    <animated-number 
                        :value="count"
                        :formatValue="formatToInteger"
                        :duration="duration"
                        />
                </div>
            </div>
            <div class="mt-3 mx-3" style="height:50px;">
                <div class="text-uppercase large">
                    <a :href="url" style="color:white">
                        <slot></slot>
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        props: ['count', 'classType', 'url'],

        data() {
            return {
                duration: 1000
            }; 
        },

        computed: {
            applyClassType(){
                if (this.classType == 'portuser'){
                    return 'bg-primary card-bg-icon-portusers';
                }
                if (this.classType == 'vehicle'){
                    return 'bg-warning card-bg-icon-vehicles';
                }
                if (this.classType == 'visitor'){
                    return 'bg-danger card-bg-icon-visitors';
                }                                
            }
        },
        methods: {
            formatToInteger(value) {
                return `${Number(value).toFixed(0)}`;
            },
        },
    }
</script>
