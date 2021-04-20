<template>
    <div class="flex sticky flex-col w-screen max-w-screen h-container justify-start">
        <div class="flex justify-between h-16 px-16">
        <a class="text-indigo-700 font-semibold cursor-pointer tracking-wide" href="#">{{ trans('components.selectCourses') }}</a>
        <a class="text-indigo-700 font-semibold cursor-pointer tracking-wide" href="#">{{ trans('components.chooseAll') }}</a>
        </div>
        <div class="flex w-screen max-w-screen h-screen-1/2 flex-grow-0 justify-evenly content-center items-start">
        <continent v-for="(continent, index) in geography.continents" :key="index" :id="index" :continent="continent"></continent>
        </div>
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