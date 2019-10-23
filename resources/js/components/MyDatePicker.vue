<template>
    <datepicker 
        ref="mypicker"
        v-model="fieldDate" 
        name="expires_on" 
        id='expires_on' 
        placeholder="Expiration date" 
        input-class="form-control"
        format="yyyy-MM-dd"
        typeable
    ></datepicker>                                       
</template>

<script>
    export default {

        props: ['fieldDate'],

        data() {
            return {
                someVariable: ''
            }
        }
    }
</script>
