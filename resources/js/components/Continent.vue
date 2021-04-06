<template>
    <div>
        <h3>{{ trans('continents.' + id) }}</h3>
        <region v-for="(region, index) in continent.regions" :key="index" 
            :region="region" :id="continent.name + index"></region>         
    </div>
</template>

<script>
    import Region from './Region.vue';

    export default {
        components: { Region },
        props: {
            continent: Object,
            id: Number
        }
    }
</script>