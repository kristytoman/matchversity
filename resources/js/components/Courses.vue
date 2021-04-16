<template>
    <div class="relative flex-1 flex-col justify-evenly">
        <div class="flex-1 flex-row flex justify-evenly h-screen-3/4" style="">
            <semester :title="trans('components.winter')" 
                      :courses="winterCourses" 
                      @delete-course="$emit('delete-course')">
            </semester>
            <semester :title="trans('components.summer')" 
                      :courses="summerCourses"
                      @delete-course="$emit('delete-course')">
            </semester>
        </div>
    </div>
</template>

<script>
import Semester from './Semester.vue';

export default {
    components: { Semester },
    props: {
        summerCourses: Object,
        winterCourses: Object
    }
}
</script>