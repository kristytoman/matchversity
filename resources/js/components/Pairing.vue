<template>
    <div>
        <span>{{ data.name }}</span><span>{{ this.rating() }}</span>
        <div v-for="(course, index) in data.courses" :key="index">
            <span>{{ course.code }}</span>
            <span>{{ course.nameCZ }}</span>
            <span>{{ course.nameEN }}</span>
            <span>{{ course.semester }}</span>
            <span>{{ course.year }}</span>
            <span>{{ course.reason }}</span>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        data: Object
    },
    methods: {
        rating() {
            let rating = 0;
            let count = 0;
            for (let i = 0; i < this.data.courses.length; i++) {
                if (course[i].rating) {
                    rating += course[i].rating;
                    count++;
                }
            }
            if (count > 0)
            {
                return rating/count;
            }
            else {
                return 0;
            }
        }
    }
    
}
</script>