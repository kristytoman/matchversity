<template>
   <div :class="style">
        <span class="space-x-6" @click="open = !open">
            <span class="text-red-800" >
                <span class="font-bold">{{ course.reason ? trans('components.cancel') : ""}}</span>
                <span>{{ course.mobility.is_summer ? trans('components.summer') : trans('components.winter') }}</span>
                <span>{{ course.mobility.year }}</span>
            </span>
            <span>{{ course.home_course.code }}</span>
            <span>{{ courseName }}</span>
        </span>
        <span v-show="open" v-if="course.reason && course.reason_id > 1 && course.reason.is_verified"
            class="mt-1">
            {{ isCzech ? course.reason.description_cz : course.reason.description_en }}</span>
   </div> 
</template>

<script>
export default {
    props: {
        course : Object,
    },
    data() {
        return {
            courseName : isCzech? this.course.home_course.name_cz : this.course.home_course.name_en,
            style: this.course.reason && this.course.reason_id > 1 && this.course.reason.is_verified ? "flex flex-col mb-2 hover:bg-red-200 cursor-pointer" : "mb-2",
            open: false
        }
    },
}
</script>