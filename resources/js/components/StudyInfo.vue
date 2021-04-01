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
        <select @select="sendCourses">
            <optgroup label="Prezenční" v-if="fields">
            <option v-for="(field, index) in fields.full" :key="index">{{ field.nazev }} ({{field.jazyk}}) since {{field.platnyOd}}</option>
            </optgroup>
                <optgroup label="Kombinovaná" v-if="fields">
            <option v-for="(field, index) in fields.part" :key="index">{{ field.nazev }} ({{field.jazyk}}) since {{field.platnyOd}}</option>
            </optgroup>
        </select>
        <label @select="sendCourses">Grade</label>
        <input type="number" min="1" max="4">
        <span>Or you can try to <a href="#">log in</a></span>
    </div>
</template>

<script>

export default {
    data() {
        return {
            faculty: "",
            fields: null,
            type: ""
        }
    },
    props: {
        fieldRoute: String
    },
    methods: {
        async findFields() {
            if (this.type && this.faculty) {
                this.fields = [];
                const response = await fetch(this.fieldRequest);
                this.fields = await response.json();
            }
        }
    },
    computed: {
        fieldRequest() {
            return this.fieldRoute + '/' + this.type + '/' + this.faculty;
        }
    }
}
</script>