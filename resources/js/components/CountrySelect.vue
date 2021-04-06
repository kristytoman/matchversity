<template>
    <div>
        <a href="#">{{ trans('components.chooseAll') }}</a>
        <continent v-for="(continent, index) in geography.continents" :key="index" :id="index" :continent="continent"></continent>
    </div>
</template>

<script>
    import Continent from './Continent.vue';

    export default {
        components: { Continent },
        props: {
            geography: Object
        },
    }
</script>