<template>
    <div>
        <span>{{ data.name }}</span><span>{{ this.rating() }}</span>
        <pairing-course v-for="(course, index) in data.courses" :key="index"
        :course="course">
        </pairing-course>
    </div>
</template>

<script>
import PairingCourse from './PairingCourse.vue';
export default {
  components: { PairingCourse },
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