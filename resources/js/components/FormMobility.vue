<template>
    <div class="flex flex-col w-screen-3/5
                ml-8 mb-16 px-8 py-6 bg-red-300 rounded-2xl mobility">
        <span name="mobility-info" v-if="!isdelete" class="flex flex-col justify-evenly">
            <div name="student">Student</div>
            <input :name="inputName + '[student]'" :value="mobility.student.data"
                   class="flex flex-1 w-full
                          my-2 py-2 px-2 bg-red-100
                          border border-red-300 rounded">
            <span class="text-red-600">{{ mobility.student.message }}</span><br>
           <div>Univerzita</div>
           <span class="flex">
            <input :name="inputName + '[university]'" :value="mobility.university.data"
               class="flex flex-1 w-full
                      my-2 py-2 px-2 bg-red-100
                      border border-red-300 rounded">
            <input :name="inputName + '[city]'" :value="mobility.city"
               class="flex flex-1 w-full
                      my-2 py-2 px-2 bg-red-100
                      border border-red-300 rounded">
            <span class="text-red-600">{{ mobility.university.message }}</span><br>
            </span>
            <div>Doba</div>
            <span class="flex items-center">
        <input :name="inputName + '[arrival]'" :value="mobility.arrival.data"
                class="flex flex-1 w-full
                      my-2 py-2 px-2 bg-red-100
                      border border-red-300 rounded"><span class="w-4 text-center"> - </span> 
        <input :name="inputName + '[departure]'" :value="mobility.departure.data"
                class="flex flex-1 w-full
                      my-2 py-2 px-2 bg-red-100
                      border border-red-300 rounded"><br>
            </span>
            <span class="text-red-600">{{ mobility.arrival.message }}</span>
            <span class="text-red-600">{{ mobility.departure.message }}</span><br>
            <div>Semestr</div><span class="flex">
        <input :name="inputName + '[semester]'" :value="mobility.semester.data"
                class="flex flex-1 w-full
                      my-2 py-2 px-2 bg-red-100
                      border border-red-300 rounded">
        <input :name="inputName + '[year]'" :value="mobility.year.data"
                class="flex flex-1 w-full
                      my-2 py-2 px-2 bg-red-100
                      border border-red-300 rounded">
                      </span>
            <span class="text-red-600">{{ mobility.semester.message }}</span><br>
            <span class="text-red-600">{{ mobility.year.message }}</span>
        <span class="text-red-800">{{ trans('components.pairings') }}</span>
        <form-pairing v-for="(pairing, index) in mobility.pairings" :key="index" 
            :pairing="pairing" :inputName="inputName + '[pairing][' + index + ']'"></form-pairing>
        <span class="text-red-600">{{ mobility.message }}</span><br>
        </span>
        <span name="delete" @click="isdelete = !isdelete" 
              class="bg-red-900 max-w-max text-white
                     px-4 py-2 border rounded-md
                     hover:bg-red-700 hover:border-red-200 ">
                     {{ trans('components.' + buttonName) }}
        </span>
    </div>
</template>

<script>
import FormPairing from './FormPairing.vue';


export default{
    setup() {
        
    }, 

    components: { FormPairing },
    data() {
        return {
            isdelete: false
        }
    },
    props: {
        mobility: Object,
        inputName: String
    },
    computed: {
        buttonName() {
            if (this.isdelete) {
                return "undo";
            }
            return "delete";
        }
    }
}
</script>
  