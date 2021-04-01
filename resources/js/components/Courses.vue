<template>
    <div>
        <semester title="Winter" :courses="winterCourses"></semester>
        <semester title="Summer" :courses="summerCourses"></semester>
    </div>
</template>

<script>
import Semester from './Semester.vue';

export default {
    components: { Semester },
    props: {
        summerCourses: Object,
        winterCourses: Object
    },

}
</script>