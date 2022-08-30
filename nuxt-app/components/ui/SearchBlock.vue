<template>
    <b-form @submit.prevent="handleSearch" @keydown="handleSearchChange" class="search-form">
        <b-form-group>
            <b-form-input
                type="text"
                v-model="form.searchQuery"
                :placeholder="$t('search_products')"
                autocomplete="off"
            />
        </b-form-group>

        <button type="submit">
            <i class="icon-search"></i>
        </button>

        <div class="search-form__results" v-if="showResults && form.searchQuery !== ''">
            <div class="search-products" v-if="products.length">
                <div class="search-products__item" v-for="product in sliced_products" :key="product.id">
                    <search-product :product="product" />
                </div>
            </div>
            <template v-if="products.length > 5">
                <nuxt-link class="search-form__show-all" :to="$localePath('search', {}, { q: form.searchQuery })">
                    {{ $t("show_all") }} ({{ products.length }})
                </nuxt-link>
            </template>
        </div>
    </b-form>
</template>

<script>
import { required } from "vuelidate/lib/validators";
import { debounce } from "debounce";
import { mapGetters } from "vuex";
import SearchProduct from "@/components/products/SearchProduct";

export default {
    components: {
        SearchProduct
    },
    watch: {
        $route() {
            this.showResults = false;
            this.form.searchQuery = "";
        },
    },
    data() {
        return {
            pending: false,
            showResults: false,
            form: {
                searchQuery: "",
            },
        };
    },
    validations: {
        form: {
            searchQuery: { required },
        },
    },
    computed: {
        ...mapGetters({
            products: "search/getItems"
        }),
        sliced_products() {
            return this.products.slice(0, 5);
        }
    },
    methods: {
        handleSearchChange: debounce(function() {
            if (!this.$v.$invalid && !this.pending) {
                this.pending = true;

                this.$nuxt.$loading.start();
                this.$store
                    .dispatch("search/searchProducts", { q: this.form.searchQuery })
                    .then(() => {
                        this.pending = false;
                        this.showResults = true;
                    });
            }
        }, 300),

        handleSearch() {
            this.$v.form.$touch();

            if (!this.$v.$invalid && !this.pending) {
                this.pending = true;
                this.$nuxt.$loading.start();

                this.$store
                    .dispatch("search/searchProducts", { q: this.form.searchQuery })
                    .then(() => {
                        this.$router.push({
                            path: "/search",
                            query: { q: this.form.searchQuery },
                        });
                        this.resetForm();
                    });
            }
        },

        resetForm() {
            this.form.searchQuery = "";
            this.pending = false;
            this.$v.$reset();
        },
    },
};
</script>
