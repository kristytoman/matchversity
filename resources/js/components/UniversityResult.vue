<template>
    <div><a :href="route">
        <span>{{ university.name }}</span>
        <span>{{ university.native }}</span>
        <span>{{ university.city }}, {{ university.countryID }}</span>
        <div>
            <span v-for="(course, index) in university.courses" :key="index">{{ course.name }}</span>
        </div>
        </a>
    </div>
</template>

<script>
export default {
    props: {
        university: Object,
        route: String
    }
}
</script>