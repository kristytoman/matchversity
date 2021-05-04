<template>
    <div class="my-2" v-show="show">
        <label :class="color">{{ trans('countries.' + data.code) }}
        <input name="countries[]" :value="data.code" type="checkbox" v-show="false"
               :disabled="!data.enabled" v-model="data.selected" :checked="isSelected" @change="onChange()"></label>
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
            },
            color() {
                if (this.isSelected) {
                    return "text-red-600 cursor-pointer";
                }
                if (this.country.enabled) {
                    return "text-black cursor-pointer";
                }
                return "text-gray-400";
            }
        },
        methods: {
            onChange() {
                if (this.isSelected) {
                    this.$emit('checked');
                }
                else {
                    this.$emit('unchecked');
                }
            }
        }
    }
</script>