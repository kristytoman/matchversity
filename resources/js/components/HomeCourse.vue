<template>
    <div class="ml-8 flex justify-between items-center w-screen-3/4 bg-red-200 px-8 py-6 rounded-2xl my-8">
        <span class="flex justify-evenly text-lg text-red-900 space-x-8">
        <span class="font-semibold">{{ course.code }}</span>
        <span class="overflow-ellipsis">{{ course.name_cz }}</span>
        <span class="overflow-ellipsis">{{ course.name_en }}</span>
        </span>
        <input type="number" :name="'group[' + course.id + ']'" :value="course.group" 
               class="h-12 w-16 my-2 p-1 bg-red-100 border-red-800 text-red-900 border rounded">
    </div>
</template>

<script>
    export default {
        props: {
            course : {
                type: Object,
                required: true
            }
        }
    }
</script>