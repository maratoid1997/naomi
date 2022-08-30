<template>
    <section class="page" id="scroll-target">
        <breadcrumbs :items="breadcrumbs" />

        <b-container fluid>
            <b-row>
                <b-col>
                    <section-header :title="$t('products')" />
                </b-col>
            </b-row>

            <div class="grid-list">
                <b-row cols="2" cols-xl="5" cols-lg="4" cols-md="3">
                    <b-col v-for="product in products" :key="product.id">
                        <product-card :product="product" />
                    </b-col>
                </b-row>
            </div>

            <b-row v-if="products.length >= 24">
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
        </b-container>

        <modal-product-view />
    </section>
</template>

<script>
import { mapState, mapGetters } from "vuex";
import Breadcrumbs from "@/components/layout/Breadcrumbs";
import SectionHeader from "@/components/ui/SectionHeader";
import ProductCard from "@/components/products/ProductCard";
import ModalProductView from "@/components/ui/ModalProductView";

export default {
    name: "Brand-products-page",
    nuxtI18n: {
        paths: {
            az: "/brendler/:id",
            ru: "/brendi/:id",
            en: "/brands/:id",
        },
    },
    components: {
        Breadcrumbs,
        SectionHeader,
        ProductCard,
        ModalProductView,
    },
    computed: {
        ...mapState({
            breadcrumbs: ({ brandProducts }) => brandProducts.breadcrumbs,
            pagination: ({ brandProducts }) => brandProducts.pagination,
        }),
        ...mapGetters({
            products: "brandProducts/getItems",
        }),
        current_page: {
            get() {
                return this.pagination.current_page;
            },
            set(value) {
                this.$store.commit(
                    "SET_PAGINATION_PAGE",
                    { module: "brandProducts", page: value },
                    { root: true }
                );
            },
        },
    },
    methods: {
        onPaginationClick() {
            this.$store.dispatch("brandProducts/fetchBrandProducts", {
                brandId: this.$route.params.id,
                filters: { page: this.pagination.current_page }
            })
            .then(() => {
                this.$router.push({
                    query: { page: this.pagination.current_page }
                });
                this.$scrollTo("#scroll-target", { offset: -100 });
            });
        },
    },
    async asyncData({ store, params, query }) {
        const filters = {};
        const { page } = query;
        if (page) filters.page = parseInt(page);
        
        await store.dispatch("brandProducts/fetchBrandProducts", { brandId: params.id, filters });
    },
};
</script>
