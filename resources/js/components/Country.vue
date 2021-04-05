<template>
    <div v-show="show">
        <label>{{ country.name }}</label>
        <input name="countries[]" :value="country.code" type="checkbox" 
               :disabled="!country.enabled" v-model="country.selected" :checked="isSelected">
    </div>
</template>

<script>
    export default {
        props: {
            country: Object,
            show: Boolean
        },
        computed: {
            isSelected() {
                return this.country.selected && this.country.enabled;
            }
        }
    }
</script>