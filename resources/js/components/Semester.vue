<template>
    <div :class="enabled">
        <div class="cursor-pointer text-gray-800 hover:text-gray-400" @click="enable">
            <span class="text-2xl font-500">{{ title }}
                <button v-if="selected">
                    <svg class="text-red-300" xmlns="http://www.w3.org/2000/svg" 
                        width="18" height="18" viewBox="0 0 18 18" stroke="currentColor">
                        <path d="M6.61 11.89L3.5 8.78 2.44 9.84 6.61 14l8.95-8.95L14.5 4z"/>
                    </svg>
                </button>
            </span>
        </div>
        <div v-if="courses" class="overflow-y-hidden pb-10 hide-scroll-bar h-screen-3/4">
            <div v-for="(course, index) in data" :key="index"
                @click="remove(index)"
                :class="disabled">
                {{ course.name_cz }}
                <button class="cursor-pointer ml-2 w-3 h-full flex items-center 
                               text-white outline-none focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" 
                         width="100%" height="100%" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" 
                         stroke-linejoin="round" class="feather feather-x w-4 h-4">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <input v-for="(course, index) in selected" :key="'i' + index"
                   type="hidden"
                   :name="'courses[]'"
                   :value="course.code">
        </div>
    </div>
</template>

<script>

export default {
    props: {
        courses: Object,
        title: String
    },
    data() {
        return {
            selected: null,
            enabled: 'flex-1 opacity-100 mr-3',
            data: this.courses
        }
    },
    methods: {
        remove(id) {
            if (this.selected) {
                this.$delete(this.courses, id);
                console.log(id);
                this.$emit('delete-course');
            }
        },
        enable() {
            if (this.selected) {
                this.selected = null;
                this.enabled = 'flex-1 opacity-50';
            }
            else {
                this.enabled = 'flex-1 opacity-100';
                this.selected = this.courses;
            }
        }
    },
    watch: {
        courses(newVal) {
            if (this.selected || !this.data) {
                this.selected = newVal;
            }
            this.data = newVal;
        }
    },
    computed: {
        disabled() {
            if (this.selected) {
                return "inline-flex items-center text-xs px-3 mx-1 my-1 py-1 width-auto hover:bg-red-500 bg-red-300 text-red-900 focus:outline-none focus:border-none bg-transparent cursor-pointer rounded-xl"
            }
            else
            {
                return "inline-flex items-center text-xs px-3 mx-1 my-1 py-1 width-auto bg-red-300 text-red-900 focus:outline-none focus:border-none bg-transparent cursor-default rounded-xl"
            }
        }
    }
}
</script>