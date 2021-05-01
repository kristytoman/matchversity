<template>
    <div class="my-6 min-w-continent w-full w-continent max-h-screen-1/2 flex-grow-0">
        <div class="grid grid-cols-3 w-full items-center">
        <span :class="'text-lg cursor-pointer col-span-2 ' + color" @click="showCountries = !showCountries">{{ trans('regions.' + id) }}</span>
        <input type="checkbox" class="form-checkbox h-5 w-5 justify-self-end text-red-600 border-red-300 border-2 rounded-full"
               @click="checkCountries" :checked="isChecked" :disabled="isDisabled">
        </div>
        <div class="max-h-32 overflow-auto overscroll-y-contain">
            <country v-for="(country, index) in region.countries" :key="index"
                :country="country" :show="showCountries"></country>
        </div>
    </div>
</template>

<script>
    import Country from './Country.vue';

    export default {
        components: { Country },
        props: {
            reg: Object,
            id : String
        },
        data() {
            return {
                showCountries: false,
                region: this.reg,
                countries: this.reg.countries,
                
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
            isChecked() {
                return !this.countries.map(a => a.selected).includes(false);
            },
            isDisabled() {
                return !this.countries.map(a => a.enabled).includes(true);
            },
            color() {
                if (this.isDisabled) {
                    return 'text-gray-400';
                }
                return '';
            }
        }
    }
</script>