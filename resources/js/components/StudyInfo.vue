<template>
    <div class="flex flex-col w-screen md:flex-row md:h-container justify-evenly">
        <div class="flex flex-1 h-container w-full flex-col pb-24 justify-evenly">
            <div class="flex flex-col w-3/4 md:w-3/5 justify-center self-center bg-red-800 px-8 py-6 rounded-2xl">
                <span class="flex justify-center text-red-100 mb-3">
                    {{ trans('components.searchByField') }}
                </span>
                <div class="flex flex-row">
                    <select v-model="faculty" 
                            class="my-2 p-1 mx-3 flex-1  flex border bg-red-100 border-red-200 text-red-900 rounded"
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
                            class="my-2 p-1 flex-1  bg-red-100 border-red-200 text-red-900  mx-3 
                                   flex border rounded"
                            @change="findFields()">
                        <option value="" disabled selected>{{ trans('components.degree') }}</option>
                        <option value="1">{{ trans('components.bc') }}</option>
                        <option value="2">{{ trans('components.mgr') }}</option>
                        <option value="3">{{ trans('components.con') }}</option>
                    </select>
                </div>
                <div class="flex flex-col">
                    <select v-model="field"
                            class="my-2 p-1 mx-3 flex border bg-red-100 border-red-200 text-red-900 rounded">
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
                <div class="flex items-center justify-evenly">
                    <input type="number" min="1" max="4" v-model="grade" 
                           :placeholder="trans('components.grade')"
                           class="my-2 p-1 mx-3 flex border bg-red-100 w-full placeholder-red-900 border-red-200 text-red-900 rounded">
                <span class="text-red-100 hover:text-red-300 cursor-pointer mx-3" @click="findCourses()">{{ trans('components.search') }}</span>
                           
                </div>
            </div>
            <div class="flex flex-col justify-center w-3/4 md:w-3/5 mt-4 self-center bg-red-800 px-8 py-6 rounded-2xl">
                <span class="flex justify-center text-red-100 mb-3">
                    {{ trans('components.searchByCode') }}
                </span>
                <span class="flex justify-evenly items-center">
                <input placeholder="Zkratka předmětu" v-model="code" 
                       class="my-2 p-1 mx-3 flex border bg-red-100 placeholder-red-900  border-red-200 text-red-900 rounded">
                <span class="text-red-100 hover:text-red-300 cursor-pointer" @click="fetchCourse()">{{ trans('components.search')}}</span></span>
                <span class="text-red-300">{{ error }}</span>
            </div>
            <div class="text-red-700 self-center mt-4 font-semibold cursor-pointer tracking-wide"
                @click="$emit('change-view')">
                {{ trans('components.selectCountries')}}
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
            summerList: {},
            winterList: {},
            error: "",
            code: "",
            course: {}
        }
    },
    props: {
        fieldRoute: String,
        coursesRoute: String,
        countriesRoute: String,
        courseRoute: String,
        token: String
    },
    methods: {
        async findFields() {
            if (this.type && this.faculty) {
                this.fields = [];
                try {
                const response = await fetch(this.fieldRequest);
                this.fields = await response.json();
                }
                catch (error) {

                }
            }
        },
        async findCourses() {
            if (this.field) {
                try {
                    const response = await fetch(this.courseRequest, {        
                    headers: {
                        "X-CSRF-TOKEN": this.token,
                        "Access-Control-Allow-Credentials" : true
                    },
                    method: "GET", 
                    credentials: "same-origin"})
                    const courseList = await response.json();
                    this.summerList = Object.assign({}, courseList.summer, this.summerList);
                    this.winterList = Object.assign({}, courseList.winter, this.summerList);
                    const session = Object.keys(courseList.summer);
                    await this.fetchCountries(session.concat(Object.keys(courseList.winter)));
                } catch(error) {
                    console.log(error);
                }
            }
        },
        async fetchCountries(countries)
        {
            try {
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
            this.$emit('selected-countries', data);
            }
            catch(error) {
                console.log(error);
            }
        },
        async onDeleteCourse()
        {
            await this.fetchCountries(Object.assign({}, this.summerList, this.winterList));
        },
        async fetchCourse() {
            if (this.code) {
                try {
                    console.log(this.courseRoute + '/' + this.code);
                    const response = await fetch(this.courseRoute + '/' + this.code);
                    const courseCode = await response.json();
                
                this.$set(this.course, courseCode.code, courseCode);
                if (this.course) {
                    if (courseCode.fields[0].pivot.is_summer) {
                        this.summerList = Object.assign({}, this.course, this.summerList);
                        console.log(this.summerList);
                    }
                    else {
                        this.winterList[courseCode.code] =  Object.assign({}, this.course, this.winterList);
                        console.log(this.winterList);

                    }
                    const session = Object.keys(this.summerList);
                    await this.fetchCountries(session.concat(Object.keys(this.winterList)));
                    this.code = ""
                }
                }
                catch (error) {
                    console.log(error);
                }
            }
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