<template>
    <div>
        <div>
            <span>{{ pairing.foreign_course.name }}</span>
            <span>{{ pairing.home_course.code }}</span>
            <span>{{ courseName}}</span>
        </div>
            <fieldset v-if="!pairing.reason_id">
                <input type="radio" :name="'rate[' + pairing.id + ']'" value="0" :checked="pairing.rating === 0">
                <input type="radio" :name="'rate[' + pairing.id + ']'" value="1" :checked="pairing.rating == 1">
                <input type="radio" :name="'rate[' + pairing.id + ']'" value="2" :checked="pairing.rating == 2">
                <input type="radio" :name="'rate[' + pairing.id + ']'" value="3" :checked="pairing.rating == 3">
                <input type="radio" :name="'rate[' + pairing.id + ']'" value="4" :checked="pairing.rating == 4">
                <input type="radio" :name="'rate[' + pairing.id + ']'" value="5" :checked="pairing.rating == 5">
            </fieldset>
            <div v-else>
            <select :name="'reason[' + pairing.id +']'" :value="pairing.reason_id">
                <option v-for="(reason, index) in reasons" :key="index" 
                        :value="reason.id">
                    {{ reasonDescription }}
                </option>
            </select>
            <input type="text" :name="'new[' + pairing.id +']'">
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
            courseName: isCzech? pairing.home_course.name_cz : pairing.home_course.name_en,
            reasonDescription: isCzech? reason.description_cz : reason.description_en
        }
    }
}
</script>
