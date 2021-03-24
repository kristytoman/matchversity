<template>
    <ul v-if="errors">
        <li v-for="(error, index) in errors" :key="index">{{ error }}</li>
    </ul>
</template>

 <script>
export default {
    props: {
        errors: Array
    }
}
</script>
