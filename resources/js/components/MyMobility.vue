<template>
   <a name="mobility" :href="showRoute" class="flex justify-between w-full self-center bg-red-200 hover:bg-red-400 px-8 py-6 my-4 rounded-2xl">
        <div>
            <span class="text-2xl text-red-900 font-semibold uppercase tracking-wide mb-6">{{ mobility.university.name }}</span>
            <div v-if="mobility.university.city" class="text-red-900">
              {{ mobility.university.city.name + ' ' + trans('countries.' + mobility.university.city.country_id) }}
            </div>
        </div> 
        <span class="text-3xl text-red-800 font-semibold tracking-wide self-center">{{ mobility.is_summer?trans('summer'):trans('winter') }} {{ mobility.year }}</span>
    </a>
</template>

<script>
    export default {
        props: {
            mobility : {
                type: Object,
                required: true
            },
            showRoute : {
                type: String,
                requried: true
            }
        },
    }
</script>