<template>
    <div class="flex w-screen flex-row h-container justify-evenly">
        <div class="flex flex-1 h-container flex-col pb-24 justify-evenly">
            <div class="flex flex-col justify-center w-3/5 self-center bg-indigo-800 px-8 py-6 rounded-2xl">
                <span class="flex justify-center text-gray-200 mb-3">
                    Vyhledej svoje předměty podle svého oboru
                </span>
                <div class="flex flex-row">
                    <select v-model="faculty" 
                            class="my-2 p-1 mx-3 flex-1 bg-indigo-300 flex border border-gray-200 rounded"
                            @change="findFields()">
                        <option value="" disabled selected>{{ trans('components.faculty') }}</option>
                        <option value="FAI">FAI</option>
                        <option value="FAM">FaME</option>
                        <option value="FHS">FHS</option>
                        <option value="FLK">FLK</option>
                        <option value="FMK">FMK</option>
                        <option value="FT">FT</option>
                    </select>
                    <select v-model="type"
                            class="my-2 p-1 flex-1 placeholder-gray-500 mx-3 
                                   bg-white flex border border-gray-200 rounded"
                            @change="findFields()">
                        <option value="" disabled selected>{{ trans('components.degree') }}</option>
                        <option value="1">{{ trans('components.bc') }}</option>
                        <option value="2">{{ trans('components.mgr') }}</option>
                        <option value="3">{{ trans('components.con') }}</option>
                    </select>
                </div>
                <div class="flex flex-col">
                    <select v-model="field"
                            class="my-2 p-1 mx-3 bg-white flex border border-gray-200 rounded"
                            @change="findCourses()">
                        <optgroup :label="trans('components.fulltime')" v-if="fields">
                            <option v-for="(field, index) in fields.full" :key="index" 
                                    :value="field.id">
                                    {{ field.title }} ({{ field.from }})
                            </option>
                        </optgroup>
                        <optgroup :label="trans('components.parttime')" v-if="fields">
                            <option v-for="(field, index) in fields.part" :key="index" 
                                    :value="field.id">
                                    {{ field.title }} ({{ field.from }})
                            </option>
                        </optgroup>
                    </select>
                </div>
                <div class="flex flex-col">
                    <input type="number" min="1" max="4" v-model="grade" 
                           :placeholder="trans('components.grade')"
                           class="my-2 p-1 mx-3 bg-white flex border border-gray-200 rounded"
                           @change="findCourses()">
                </div>
            </div>
            <div class="flex flex-col justify-center w-3/5 self-center bg-indigo-800 px-8 py-6 rounded-2xl">
                <span class="flex justify-center text-gray-200 mb-3">
                    Nebo vyhledej samotný předmět
                </span>
                <input placeholder="Zkratka předmětu" 
                       class="my-2 p-1 mx-3 bg-white flex border border-gray-200 rounded">
            </div>
            <div class="text-indigo-700 self-center font-semibold cursor-pointer tracking-wide"
                @click="$emit('change-view')">
                Vybrat si země výjezdu
            </div>
        </div>
        <courses :summer-courses="summerList" 
                 :winter-courses="winterList" 
                 @delete-course="onDeleteCourse"
                 @change-view="$emit('change-view')">
        </courses>
    </div>
</template>

<script>
import Courses from './Courses.vue';

export default {
    components: { Courses },
    data() {
        return {
            faculty: "",
            fields: null,
            type: "",
            field: null,
            grade: "",
            summerList: null,
            winterList: null
        }
    },
    props: {
        fieldRoute: String,
        coursesRoute: String,
        countriesRoute: String,
        token: String
    },
    methods: {
        async findFields() {
            if (this.type && this.faculty) {
                this.fields = [];
                const response = await fetch(this.fieldRequest);
                this.fields = await response.json();
            }
        },
        async findCourses() {
            if (this.field) {
                const response = await fetch(this.courseRequest);
                const courseList = await response.json();
                this.summerList = courseList.summer;
                this.winterList = courseList.winter;
                const session = Object.keys(courseList.summer);
                await this.fetchCountries(session.concat(Object.keys(courseList.winter)));
            }
        },
        async fetchCountries(countries)
        {
            const response = await fetch(this.countriesRoute, {
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": this.token
                },
                method: "POST", 
                credentials: "same-origin",
                body: JSON.stringify({courses: countries})
            });
            const data = await response.json();
            console.log(data);
            this.$emit('selected-countries', data);
        },
        async onDeleteCourse()
        {
            await this.fetchCountries(Object.assign({}, this.summerList, this.winterList));
        }
    },
    computed: {
        fieldRequest() {
            return this.fieldRoute + '/' + this.type + '/' + this.faculty;
        },
        courseRequest() {
            if (this.grade) {
            return this.coursesRoute + '/' + this.field + '/' + this.grade;
            }
            else {
                return this.coursesRoute + '/' + this.field + '/' + 1;
            }
        }
    }
}
</script>