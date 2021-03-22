<template>
    <div>
        <span>{{ course.code }}</span>
        <span>{{ course.name }}</span>
        <input type="number" :name="'group[' + course.id + ']'" :value="course.group">

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