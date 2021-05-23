<template>
    <a name="other" class="flex flex-col justify-center w-full self-center bg-red-200 hover:bg-red-400 px-8 py-6 my-4 rounded-2xl"
        :href="route">
        <span class="text-2xl text-red-900 font-semibold uppercase tracking-wide mb-2">{{ university.name }}</span>
        <span class="text-lg text-red-900 mb-1">{{ university.native_name }}</span>
        <span class="text-red-900">{{ university.city.name }}, {{ trans('countries.' + university.city.country_id) }}</span>
        <div class="overflow-hidden h-8 mt-4">
            <span v-for="(course, index) in university.foreign_courses" :key="index"
                class="inline-flex items-center text-xs px-3 mx-1 my-1 py-1 width-auto bg-red-300 text-red-900 focus:outline-none focus:border-none bg-transparent cursor-default rounded-xl">{{ course.name }}</span>
        </div>
        </a>
</template>

<script>
export default {
    props: {
        university: Object,
        route: String
    }
}
</script>