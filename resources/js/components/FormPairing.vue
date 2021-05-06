<template>
    <div>
        <span class="flex">
        <input :name="inputName + '[type]'" :value="pairing.data"
               class="flex flex-1 w-full
                      my-2 py-2 px-2 bg-red-100
                      border border-red-300 rounded">
        <input :name="inputName + '[foreignCourse]'" :value="pairing.foreignCourse.data"
               class="flex flex-1 w-full
                      my-2 py-2 px-2 bg-red-100
                      border border-red-300 rounded">
        <input :name="inputName + '[homeCourse][code]'" :value="pairing.homeCourse.data"
               class="flex flex-1 w-full
                      my-2 py-2 px-2 bg-red-100
                      border border-red-300 rounded">
        </span>
            <span class="flex">
        <input :name="inputName + '[homeCourse][name_cz]'" :value="pairing.homeCourse.nameCZ"
               class="flex flex-1 w-full
                      mb-2 py-2 px-2 bg-red-100
                      border border-red-300 rounded">
        <input :name="inputName + '[homeCourse][name_en]'" :value="pairing.homeCourse.nameEN"
                class="flex flex-1 w-full
                      mb-2 py-2 px-2 bg-red-100
                      border border-red-300 rounded">
            </span>
            <span style="color: red">{{ pairing.foreignCourse.message }}</span>
            <span style="color: red">{{ pairing.homeCourse.message }}</span>
            <span style="color: red">{{ pairing.message }}</span><br>
    </div>
</template>

<script>

export default {
    setup() {
        
    },
    props: {
        pairing: Object,
        inputName: String
    }
}
</script>
  