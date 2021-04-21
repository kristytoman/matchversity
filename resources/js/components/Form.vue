<template>
    <div class="flex">
        <study-info v-show="!showCountries"
                    :token="token" 
                    :field-route="fieldRoute" 
                    :courses-route="coursesRoute" 
                    :countries-route="countriesRoute"
                    @selected-countries="onCountriesSelected"
                    @change-view="showCountries = !showCountries">
        </study-info>
        <country-select v-show="showCountries" 
                        :geo="geo"
                        @change-view="showCountries = !showCountries">
        </country-select>
    </div>
</template>

<script>
import CountrySelect from './CountrySelect.vue'
import StudyInfo from './StudyInfo.vue'

export default {
  components: { StudyInfo, CountrySelect },
    props: {
        geography: Object,
        token: String,
        fieldRoute: String,
        coursesRoute: String,
        countriesRoute: String
    },
    data() {
        return {
            showCountries: false,
            geo: this.geography
        }
    },
    methods: {
        onCountriesSelected(countries) {
            console.log(countries);
            this.geo.continents.forEach(continent => {
                continent.regions.forEach(region => {
                    region.countries.forEach(country => {
                        if (countries.some(e => e.id === country.code)) {
                           country.enabled = true;
                        }
                        else {
                            country.selected = false;
                            country.enabled = false;
                        }
                    })
                })
            });
        }
    }
}
</script>