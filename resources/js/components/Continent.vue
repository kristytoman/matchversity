<template>
    <div>
        <h3>{{ continent.name }}</h3>
        <region v-for="(region, index) in continent.regions" :key="index" 
            :region="region" ></region>         
    </div>
</template>

<script>
    import Region from './Region.vue';

    export default {
        components: { Region },
        props: {
            continent: Object
        }
    }
</script>