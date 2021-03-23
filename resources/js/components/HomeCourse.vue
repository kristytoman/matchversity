<template>
    <div>
        <span>{{ course.code }}</span>
        <span>{{ course.name_cz }}</span><br>
        <span>{{ course.name_en }}</span>
        <input type="number" :name="'group[' + course.id + ']'" :value="course.group">
<br>
<br>

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