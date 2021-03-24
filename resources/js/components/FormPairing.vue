<template>
    <div>
        <input :name="inputName + '[type]'" :value="pairing.data"> 
        <input :name="inputName + '[foreignCourse]'" :value="pairing.foreignCourse.data">
        <input :name="inputName + '[homeCourse][code]'" :value="pairing.homeCourse.data">
        <input :name="inputName + '[homeCourse][name_cz]'" :value="pairing.homeCourse.nameCZ">
        <input :name="inputName + '[homeCourse][name_en]'" :value="pairing.homeCourse.nameEN">
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
  