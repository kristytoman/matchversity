<template>
    <div class="flex flex-col flex-none items-center justify-start
                h-screen-3/4 min-w-continent w-continent max-w-continent">
        <h3 class="text-2xl mb-8">{{ trans('continents.' + id) }}</h3>
        <div class="flex flex-col  min-w-continent w-continent max-w-continent overflow-auto overscroll-y-contain hide-scroll-bar flex-1 items-start">
        <region v-for="(region, index) in cont.regions" :key="index" 
            :reg="region" :id="cont.name + index"></region>
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
        },
        data() {
            return {
                cont: this.continent
            }
        }
    }
</script>