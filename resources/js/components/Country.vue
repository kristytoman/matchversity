<template>
    <div v-show="show">
        <label>{{ country.name }}</label>
        <input name="countries[]" :value="country.code" type="checkbox">
    </div>
</template>

<script>
    export default {
        props: {
            country: Object,
            show: Boolean
        }
    }
</script>