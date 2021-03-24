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
        <label>Study field</label>
        <select>
            <option v-for="(field, index) in fields" :key="index">{{ field.nazev }}</option>
        </select>
        <label>Grade</label>
        <input type="number" min="1" max="4">
        <span>Or you can try to <a href="#">log in</a></span>
    </div>
</template>

<script>

export default {
    data() {
        return {
            faculty: "FAI",
            fields: null
        }
    },
    methods: {
        async findFields() {
            if (this.faculty != "") {
                const response = await 
                fetch("https://stag-ws.utb.cz/ws/services/rest2/programy/getStudijniProgramy?fakulta=" + this.faculty + "&outputFormat=JSON");
                const data = await response.json();
                fields = data.programInfo;
            }
        }
    }
}
</script>