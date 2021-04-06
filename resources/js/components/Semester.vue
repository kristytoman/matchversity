<template>

    <div v-if="courses">
        <h2>{{ title }}</h2>
        <input v-for="(course, index) in courses" :key="index"
               :name="'courses['+index+']'"  :value="course.nazev" 
               @click="remove(index)"  readonly>
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