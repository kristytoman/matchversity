<template>
    <div class="flex flex-col justify-center items-center w-48 h-64 bg-red-200 py-6 my-4 rounded-2xl">
        <div class="flex flex-col space-y-4 items-center">
            <span class="text-lg text-red-900 text-center font-semibold">{{ pairing.foreign_course.name }}</span>
            <span class="text-red-900">{{ pairing.home_course.code }}</span>
        </div>
            <fieldset v-if="!pairing.reason_id" class="flex mt-2">
                <input type="radio" :name="'rate[' + pairing.id + ']'" value="0" :checked="pairing.rating === 0" v-show="false">
                <radio-star v-for="star in 5" :key="star" :pair="pairing" :index="star" @change="onChange"></radio-star>
            </fieldset>
            <div v-else>
            <select v-show="selected != 1" v-model="selected" class="flex-none p-1 flex-0 bg-red-100 border-red-200 text-red-900  w-32
                        border rounded mx-2 mt-2" :name="'reason[' + pairing.id +']'" :value="pairing.reason_id">
                <option v-for="(reason, index) in reasons" :key="index" 
                        :value="reason.id">
                    {{ reason.description_cz }}
                </option>
            </select>
            <input v-show="selected==1" type="text" :name="'new[' + pairing.id +']'" placeholder="Zadejte důvod" class="flex-none p-1 flex-0 bg-red-100 border-red-200 text-red-900  w-32
                         border rounded mx-2 mt-2">
            </div>
            </div>
</template>

<script>
import RadioStar from './RadioStar.vue';
export default {
  components: { RadioStar },
    props: {
        pairing: Object,
        reasons: Array,
        selected: 0,
    },
    methods: {
        onChange(value) {
              this.pairing.rating = value;
              console.log(this.pairing.rating);
          }
    }
}
</script>
