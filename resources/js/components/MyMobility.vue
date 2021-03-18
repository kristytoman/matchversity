<template>
   <a :href="'/mobilities/show/' + mobility.id">
        <div :id="mobility.id">
            <span>{{ mobility.id }}</span>
            <span>{{ mobility.arrival }}</span>
            <span>{{ mobility.departure }}</span>
            <span>{{ mobility.university.name }}</span>
            <div v-if="mobility.university.city">
                <span>{{ mobility.university.city.name }}</span>
                <span>{{ mobility.university.city.country_id }}</span>
            </div>
        </div> 
    </a>
</template>

<script>
    export default {
        props: {
            mobility : {
                type: Object,
                required: true
            }
        }
        
    }
</script>