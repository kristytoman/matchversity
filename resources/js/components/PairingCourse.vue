<template>
   <div class="mb-2">
       <span class="space-x-6">
       <span class="text-red-800" >
           <span class="font-bold">{{ course.reason ? 'Zrušeno' : ""}}</span>
            <span>{{ course.semester? trans('components.summer') : trans('components.winter') }}</span>
            <span>{{ course.year }}</span>
        </span>
        <span>{{ course.code }}</span>
        <span>{{ courseName }}</span>
        </span>
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