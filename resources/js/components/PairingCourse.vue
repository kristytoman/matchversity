<template>
   <div>
        <span>{{ course.code }}</span>
        <span>{{ courseName }}</span>
        <span>{{ course.semester? trans('components.summer') : trans('components.winter') }}</span>
        <span>{{ course.year }}</span>
        <span>{{ course.reason }}</span>
   </div> 
</template>

<script>
export default {
    props: {
        course : Object,
    },
    data() {
        return {
            courseName : isCzech? this.course.nameCZ : this.course.nameEN,
        }
    },
}
</script>