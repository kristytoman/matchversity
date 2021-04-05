<template>
    <div>
        <span @click="showCountries = !showCountries">{{ region.name }}</span>
        <input type="checkbox" @click="checkCountries" :checked="isChecked" :intermediate="isIntermediate" :disabled="isDisabled">
        <country v-for="(country, index) in region.countries" :key="index"
            :country="country" :show="showCountries"></country>
    </div>
</template>

<script>
    import Country from './Country.vue';

    export default {
        components: { Country },
        props: {
            region: Object
        },
        data() {
            return {
                showCountries: false
            }
        },
        methods: {
            changeSelect(state) {
                this.region.countries.forEach(function (country) {
                    country.selected = state;
                });
            },
            checkCountries() {
                const list = this.region.countries.map(a => a.selected);
                if (list.includes(false)) {
                    this.changeSelect(true);
                }
                else {
                    this.changeSelect(false);
                }
            }
        },
        computed: {
            isIntermediate() {
                return this.region.countries.map(a => a.selected).includes(false) && this.region.countries.map(a => a.selected).includes(true);
            },
            isChecked() {
                return !this.region.countries.map(a => a.selected).includes(false);
            },
            isDisabled() {
                return !this.region.countries.map(a => a.enabled).includes(true);
            }
        }
    }
</script>