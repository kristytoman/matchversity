<template>

    <div v-if="courses">
        <h2>{{ title }}</h2>
        <input v-for="(course, index) in courses" :name="'courses['+index+']'" :key="index" @click="remove(index)" :value="course.nazev" readonly>
    </div>
</template>

<script>

export default {
    props: {
        courses: Object,
        title: String
    },
    methods: {
        remove(id) {
            this.$delete(this.courses, id);
            console.log(id);
            this.$emit('delete-course');
        }
    }
}
</script>