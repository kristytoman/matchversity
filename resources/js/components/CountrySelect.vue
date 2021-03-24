<template>
    <div>
        <input type="text" placeholder="Vyhledat zemi">
        <a href="#">Choose all of them</a>
        <continent v-for="(continent, index) in geography.continents" :key="index" :continent="continent"></continent>
    </div>
</template>

<script>
    import Continent from './Continent.vue';

    export default {
        components: { Continent },
        props: {
            geography: Object,
            required: true
        }
    }
</script>