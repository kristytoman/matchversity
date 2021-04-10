<template>
    <div v-show="show">
        <label>{{ trans('countries.' + data.code) }}</label>
        <input name="countries[]" :value="data.code" type="checkbox" 
               :disabled="!data.enabled" v-model="data.selected" :checked="isSelected">
    </div>
</template>

<script>
    export default {
        props: {
            country: Object,
            show: Boolean
        },
        data() {
            return {
                data : this.country
            }
        },
        computed: {
            isSelected() {
                return this.country.selected && this.country.enabled;
            }
        }
    }
</script>