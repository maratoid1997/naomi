<template>
    <section class="products-page page">
        <breadcrumbs :items="breadcrumbs" />

        <category-cards
            v-if="subcategories"
            :categories="subcategories"
        />

        <b-container fluid>
            <b-row>
                <b-col>
                    <div class="products-content flex">
                        <div
                            class="products-content__filters"
                            :class="{ active: filtersVisible }"
                            @click.self="hideFilters"
                        >
                            <section-header :title="$t('filters_panel')" />
                            <filters-group
                                @filtersSubmit="hideFilters"
                                @clearFilters="handleClearFilters"
                                :filters="filters"
                            />

                            <div class="toggle-filters" @click="showFilters">
                                <img src="~/assets/images/icons/settings.svg" alt="Icon settings" />
                            </div>
                        </div>
                        <!-- Product filters -->

                        <div class="products-content__items" id="scroll-target">
                            <section-header :title="$t('products')" />
                            
                            <b-row cols="4">
                                <template v-for="(product, index) in products">
                                    <b-col v-if="index == 12 && banners.large.length" cols="12" :key="index">
                                        <static-banner :banner="banners.large[0]" />
                                    </b-col>

                                    <b-col cols="6" xl="3" md="4" :key="product.id">
                                        <product-card :product="product" />
                                    </b-col>
                                </template>
                            </b-row>

                            <b-row v-if="products.length > 24">
                                <b-col>
                                    <client-only>
                                        <div class="pagination-container">
                                            <paginate
                                                v-model="current_page"
                                                :page-count="pagination.total_pages"
                                                :click-handler="onPaginationClick"
                                                :container-class="'pagination'"
                                                :prev-text="`<i class='icon-angle-left'></i>`"
                                                :next-text="`<i class='icon-angle-right'></i>`"
                                            />
                                        </div>
                                    </client-only>
                                </b-col>
                            </b-row>
                        </div>
                        <!-- Product items -->
                    </div>
                    <!-- Products content -->
                </b-col>
            </b-row>
        </b-container>

        <modal-product-view />
    </section>
</template>

<script>
import { mapState, mapGetters } from "vuex";
import Breadcrumbs from "@/components/layout/Breadcrumbs";
import SectionHeader from "@/components/ui/SectionHeader";
import CategoryCards from "@/components/products/CategoryCards";
import FiltersGroup from "@/components/products/FiltersGroup";
import ProductCard from "@/components/products/ProductCard";
import StaticBanner from "@/components/ui/StaticBanner";
import ModalProductView from "@/components/ui/ModalProductView";

export default {
    name: "products-page",
    components: {
        Breadcrumbs,
        SectionHeader,
        CategoryCards,
        FiltersGroup,
        ProductCard,
        StaticBanner,
        ModalProductView,
    },
    data() {
        return {
            filtersVisible: false,
        };
    },
    computed: {
        ...mapState({
            breadcrumbs: ({ category }) => category.data.breadcrumbs,
            pagination: ({ category }) => category.data.pagination,
            banners: ({ category }) => category.data.banners
        }),
        ...mapGetters({
            subcategories: "category/getSubcategories",
            filters: "category/getFilters",
            products: "category/getProducts",
        }),
        current_page: {
            get() {
                return this.pagination.current_page;
            },
            set(value) {
                this.$store.commit("category/SET_PAGE", value);
            },
        },
    },
    watch: {
        $route() {
            this.fetchFilteredData();
        },
    },
    methods: {
        showFilters() {
            this.filtersVisible = true;
            document.body.style.overflow = "hidden";
        },

        hideFilters() {
            this.filtersVisible = false;
            document.body.style.overflow = "auto";
        },

        handleClearFilters() {
            const { params } = this.$route;
            return this.$store.dispatch("category/fetchCategoryData", params.category);
        },

        async fetchFilteredData() {
            const params = this.$route.params;
            const query = this.$route.query;
            const filters = {};

            Object.keys(query).forEach((key) => {
                if (Array.isArray(query[key])) {
                    filters[key] = [...query[key]];
                } else {
                    filters[key] = query[key];
                }
            });

            if (Object.keys(filters).length > 0) {
                this.$nuxt.$loading.start();
                filters.category = query.category || params.category;
                await this.$store.dispatch("category/fetchFilteredCategoryData", { ...filters, refresh: 0 });
                this.$scrollTo("#scroll-target", { offset: -100 });
            }
        },

        onPaginationClick() {
            this.$router.push({ query: { page: this.pagination.current_page } });
        },
    },
    async asyncData({ store, params, query, error }) {
        try {
            await store.dispatch("category/fetchCategoryData", params.category);
        } catch(_) {
            error("Data not found");
        }

        const filters = {};
        Object.keys(query).forEach((key) => {
            if (Array.isArray(query[key])) {
                filters[key] = [...query[key]];
            } else {
                filters[key] = query[key];
            }
        });

        if (Object.keys(filters).length > 0) {
            filters.category = query.category || params.category;
            return store.dispatch(
                "category/fetchFilteredCategoryData",
                { ...filters, refresh: 0 }
            );
        }
    },
};
</script>
