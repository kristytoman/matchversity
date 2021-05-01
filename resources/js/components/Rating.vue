<template>
    <div class="flex flex-col justify-center items-center w-48 h-64 bg-red-200 py-6 my-4 rounded-2xl">
        <div class="flex flex-col space-y-4 items-center">
            <span class="text-lg text-red-900 text-center font-semibold">{{ pairing.foreign_course.name }}</span>
            <span class="text-red-900">{{ pairing.home_course.code }}</span>
            <span>{{ courseName }}</span>
        </div>
            <fieldset v-if="!pairing.reason_id" class="flex">
                <input type="radio" :name="'rate[' + pairing.id + ']'" value="0" :checked="pairing.rating === 0" v-show="false">
                <label v-for="(star, index) in stars" :key="index" :class="star + ' cursor-pointer'"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-6 h-6">
        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
            </path></svg><input type="radio" :name="'rate[' + pairing.id + ']'"  @change="onChange($event)" :value="index" :checked="pairing.rating == index" v-show="false"></label>
            </fieldset>
            <div v-else>
            <select class="w-44 mx-2" :name="'reason[' + pairing.id +']'" :value="pairing.reason_id">
                <option v-for="(reason, index) in reasons" :key="index" 
                        :value="reason.id">
                    {{ reason.description_cz }}
                </option>
            </select>
            <input v-show="false" type="text" :name="'new[' + pairing.id +']'">
            </div>
            </div>
</template>

<script>
export default {
    props: {
        pairing: Object,
        reasons: Array
    },
    data() {
        return {
            //courseName: isCzech? this.pairing.home_course.name_cz : this.pairing.home_course.name_en,
            //reasonDescription: isCzech? this.pairing.reason.description_cz : this.pairing.reason.description_en
            stars: ["text-red-100","text-red-100","text-red-100","text-red-100","text-red-100"],
        }
    },
          methods: {
          onChange(event) {
              var data = event.target.value;
              for (let i = 0; i <= event.target.value; i++) {
                  this.stars[i] = "text-red-800"; 
                  
              }
              for (let i = event.target.value+1; i <= this.stars.length; i++) {
                  this.stars[i] = "text-red-100"; 
                  
              }
              console.log(data);
          }
      }
}
</script>
