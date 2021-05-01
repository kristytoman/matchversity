<template>
    <div class="flex-0 bg-red-100 px-8 py-6 mt-8 rounded-2xl">
        <span class="text-2xl text-red-800 mb-3 flex items-center"><span class="mr-2">{{ data.name }}</span><stars :data="rating()"></stars></span>
        <pairing-course v-for="(course, index) in data.courses" :key="index"
        :course="course">
        </pairing-course>
    </div>
</template>

<script>
import Stars from './Stars.vue';
import PairingCourse from './PairingCourse.vue';
export default {
  components: { PairingCourse, Stars },
    props: {
        data: Object
    },
    methods: {
        rating() {
            let rating = 0;
            let count = 0;
            for (let i = 0; i < this.data.courses.length; i++) {
                if (this.data.courses[i].rating) {
                    rating += this.data.courses[i].rating;
                    count++;
                }
            }
            if (count > 0)
            {
                return Math.floor(rating/count);
            }
            else {
                return 0;
            }
        }
    }
    
}
</script>