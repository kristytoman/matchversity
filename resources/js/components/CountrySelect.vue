<template>
    <div class="flex flex-col w-full h-container justify-start">
        <div class="flex justify-start h-16 px-16">
            <a id="return-to-courses" class="text-red-700 font-semibold cursor-pointer tracking-wide"
               @click="$emit('change-view')">
               {{ trans('components.selectCourses') }}
            </a>
        </div>
        <div id="country-select" class="flex w-full h-screen-1/2 flex-grow-0 justify-evenly content-center items-start">
        <continent v-for="(continent, index) in geo.continents" :key="index" :id="index" :continent="continent"></continent>
        </div>
    </div>
</template>

<script>
    import Continent from './Continent.vue';

    export default {
        components: { Continent },
        props: {
            geo: Object
        },
        data() {
            return {
                geography: this.geo
            }
        }
    }
</script>