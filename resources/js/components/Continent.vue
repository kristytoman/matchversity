<template>
    <div class="flex flex-col h-screen-1/2 min-w-continent w-continent max-w-continent flex-none items-center justify-start">
        <h3 class="text-2xl mb-8">{{ trans('continents.' + id) }}</h3>
        <div class="flex flex-col  min-w-continent w-continent max-w-continent flex-1 items-start">
        <region v-for="(region, index) in continent.regions" :key="index" 
            :region="region" :id="continent.name + index"></region>
        </div>         
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