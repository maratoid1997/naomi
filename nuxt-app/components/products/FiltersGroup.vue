<template>
    <div class="filters-group-wrapper">
        <form class="filters-group" @change="handleFiltersChange">
            <div class="filters-group__item">
                <button type="button" class="filters-group__toggler" v-b-toggle="'collapse-brands'">
                    {{ $t("filters_group.brand") }}
                </button>
                <b-collapse visible id="collapse-brands" class="filters-group__collapse">
                    <div class="filters-group__content">
                        <b-form-checkbox
                            v-for="brand in filters.brands"
                            :key="brand.id"
                            v-model="form.brands"
                            :value="brand.id"
                        >
                            {{ brand.name }}
                        </b-form-checkbox>
                    </div>
                </b-collapse>
            </div>

            <div class="filters-group__item" v-for="(value, name) in filters.dynamic" :key="name">
                <button type="button" class="filters-group__toggler" v-b-toggle="`collapse-${name}`">
                    {{ name }}
                </button>
                <b-collapse visible :id="`collapse-${name}`" class="filters-group__collapse">
                    <div class="filters-group__content">
                        <b-form-checkbox
                            v-for="filter in value"
                            :key="filter.id"
                            v-model="form.filters"
                            :value="filter.id"
                        >
                            {{ filter.name }}
                        </b-form-checkbox>
                    </div>
                </b-collapse>
            </div>

            <div class="filters-group__item">
                <button type="button" class="filters-group__toggler" v-b-toggle="'collapse-price'">
                    {{ $t("filters_group.price_range") }}
                </button>
                <b-collapse visible id="collapse-price" class="filters-group__collapse">
                    <div class="filters-group__content">
                        <div class="price-range">
                            <b-form-input type="text" :value="priceRange[0]" disabled />
                            <b-form-input type="text" :value="priceRange[1]" disabled />
                        </div>

                        <client-only>
                            <vue-slider
                                :min="minPrice"
                                :max="maxPrice"
                                tooltip="none"
                                v-model="priceRange"
                                :enableCross="false"
                                @drag-end="handleFiltersChange"
                            />
                        </client-only>
                    </div>
                </b-collapse>
            </div>

            <div class="filters-group__item">
                <button type="button" class="filters-group__toggler" v-b-toggle="'collapse-color'">
                    {{ $t("filters_group.color") }}
                </button>
                <b-collapse visible id="collapse-color" class="filters-group__collapse">
                    <div class="filters-group__content">
                        <ul class="c-picker">
                            <li v-for="color in filters.colors" :key="color.id" class="c-picker__item">
                                <input
                                    :id="`color-${color.id}`"
                                    type="checkbox"
                                    v-model="form.colors"
                                    :value="color.id"
                                    class="c-picker__input"
                                />
                                <label
                                    :for="`color-${color.id}`"
                                    class="c-picker__label"
                                    :style="`background-color: ${color.value}`"
                                />
                            </li>
                        </ul>
                    </div>
                </b-collapse>
            </div>

            <div class="filters-group__actions">
                <button type="button" class="btn action-clear" @click="handleFiltersReset">
                    <i class="icon-close"></i>
                    {{ $t("reset") }}
                </button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    props: {
        filters: {
            type: Object,
            required: true,
        }
    },
    data() {
        return {
            priceRange: [0, 0],
            form: {
                brands: [],
                filters: [],
                colors: [],
            },
        };
    },
    computed: {
        minPrice() {
            return Math.floor(this.filters.price_range.min);
        },
        maxPrice() {
            return Math.ceil(this.filters.price_range.max);
        },

        priceFrom() {
            return this.priceRange[0]
        },
        priceTo() {
            return this.priceRange[1]
        }
    },
    methods: {
        handleFiltersReset() {
            this.form.brands = [];
            this.form.filters = [];
            this.form.colors = [];

            this.$router.push({ query: {} });
            this.$emit("filtersSubmit");
            this.$emit("clearFilters");
        },

        validateQueryObj(query) {
            if (query.priceFrom == "0") delete query.priceFrom;
            if (query.priceTo == "0") delete query.priceTo;
            return query;
        },

        handleFiltersChange() {
            this.$router.push({
                query: this.validateQueryObj({
                    ...this.form,
                    priceFrom: this.priceFrom,
                    priceTo: this.priceTo
                })
            });
            this.$emit("filtersSubmit");
        },
    },
    mounted() {
        const query = this.$route.query;
        const formObj = {};

        Object.keys(query).forEach((key) => {
            if (Array.isArray(query[key])) {
                formObj[key] = [...query[key]];
            } else {
                formObj[key] = query[key];
            }
        });
        
        this.priceRange[0] = this.minPrice;
        this.priceRange[1] = this.maxPrice;

        if (formObj.priceFrom) {
            this.priceRange[0] = formObj.priceFrom;
            delete formObj.priceFrom;
        }

        if (formObj.priceTo) {
            this.priceRange[1] = formObj.priceTo;
            delete formObj.priceTo;
        }

        formObj.category && delete formObj.category;
        this.form = { ...this.form, ...formObj };
    }
};
</script>
