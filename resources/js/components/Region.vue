<template>
    <div>
        <a @click="showCountries = !showCountries">{{ region.name }}</a>
        <country v-for="(country, index) in region.countries" :key="index"
            :country="country" :show="showCountries"></country>
    </div>
</template>

<script>
    import Country from './Country.vue';

    export default {
        components: { Country },
        props: {
            region: Object
        },
        data() {
            return {
                showCountries: false
            }
        }
    }
</script>