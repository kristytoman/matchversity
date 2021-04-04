<template>
    <div>
        <semester title="Winter" :courses="winterCourses" @delete-course="$emit('delete-course')"></semester>
        <semester title="Summer" :courses="summerCourses" @delete-course="$emit('delete-course')"></semester>
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