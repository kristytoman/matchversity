<template>
    <div>
        <label>Faculty</label>
        <select @change="findFields()" v-model="faculty">
            <option value="FAI">FAI</option>
            <option value="FAM">FaME</option>
            <option value="FHS">FHS</option>
            <option value="FLK">FLK</option>
            <option value="FMK">FMK</option>
            <option value="FT">FT</option>
        </select>
        <div>
            <input type="radio" v-model="type" name="type" value="7" @change="findFields()"><label>Bakalářský</label>
            <input type="radio" v-model="type" name="type" value="8" @change="findFields()"><label>Magisterský</label>
            <input type="radio" v-model="type" name="type" value="0" @change="findFields()"><label>Navazující</label>
        </div>
        <label>Study field</label>
        <select v-model="field" @change="findCourses()">
            <optgroup label="Prezenční" v-if="fields">
            <option v-for="(field, index) in fields.full" :key="index" :value="field.oborIdno">{{ field.nazev }} ({{field.jazyk}}) since {{field.platnyOd}}</option>
            </optgroup>
                <optgroup label="Kombinovaná" v-if="fields">
            <option v-for="(field, index) in fields.part" :key="index" :value="field.oborIdno">{{ field.nazev }} ({{field.jazyk}}) since {{field.platnyOd}}</option>
            </optgroup>
        </select>
        <label>Grade</label>
        <input type="number" min="1" max="4" v-model="grade" @change="findCourses()">
        <span>Or you can try to <a href="#">log in</a></span>
        <courses :summer-courses="summerList" :winter-courses="winterList"></courses>
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
                let response = await fetch(this.courseRequest);
                const courseList = await response.json();
                this.summerList = courseList.LS;
                this.winterList = courseList.ZS;
                const session = Object.keys(courseList.LS);
                response = await fetch(this.countriesRoute, {
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": this.token
                    },
                    method: "POST", 
                    credentials: "same-origin",
                    body: JSON.stringify({courses:session.concat(Object.keys(courseList.ZS))})
                });
                console.log(await response.json());
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