<template>
    <div>
        <input :name="inputName + '[student]'" :value="mobility.student.data">
            <span style="color: red">{{ mobility.student.message }}</span><br>
        <input :name="inputName + '[university]'" :value="mobility.university.data">
            <span style="color: red">{{ mobility.university.message }}</span><br>
        <input :name="inputName + '[city]'" :value="mobility.city">
        <input :name="inputName + '[arrival]'" :value="mobility.arrival.data"> - 
        <input :name="inputName + '[departure]'" :value="mobility.departure.data"><br>
            <span style="color: red">{{ mobility.arrival.message }}</span>
            <span style="color: red">{{ mobility.departure.message }}</span><br>
        <input :name="inputName + '[semester]'" :value="mobility.semester.data">
        <input :name="inputName + '[year]'" :value="mobility.year.data">
            <span style="color: red">{{ mobility.semester.message }}</span><br>
            <span style="color: red">{{ mobility.year.message }}</span>
        <form-pairing v-for="(pairing, index) in mobility.pairings" :key="index" 
            :pairing="pairing" :inputName="inputName + '[pairing][' + index + ']'"></form-pairing>
        <span style="color: red">{{ mobility.message }}</span><br>
    </div>
</template>

<script>
import FormPairing from './FormPairing.vue';


export default{
    setup() {
        
    },
    components: { FormPairing },
    props: {
        mobility: Object,
        inputName: String
    }
}
</script>
  