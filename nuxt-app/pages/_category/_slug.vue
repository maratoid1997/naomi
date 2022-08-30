<template>
    <section class="page">
        <breadcrumbs :items="breadcrumbs" />

        <b-container fluid>
            <b-row>
                <b-col md="4">
                    <product-gallery v-if="product.imageList" :gallery="product.imageList" />
                </b-col>

                <b-col md="8">
                    <product-info :product="product" />
                </b-col>
            </b-row>
        </b-container>

        <products-slider v-if="similarProducts.length" :products="similarProducts" class="similar-products">
            <section-header :title="$t('similar_products')" />
        </products-slider>

        <b-container fluid v-if="tags.length">
            <b-row>
                <b-col>
                    <product-tags :tags="tags" />
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
import ProductGallery from "@/components/product/ProductGallery";
import ProductInfo from "@/components/product/ProductInfo";
import ProductTags from "@/components/product/ProductTags";
import ModalProductView from "@/components/ui/ModalProductView";

export default {
    name: "product-inner-page",
    head() {
        return {
            title: this.product.name,
            meta: [
                { hid: 'og:type', property: 'og:type', content: "website" },
                { hid: 'og:site_name', property: 'og:site_name', content: "homev.az" },
                { hid: 'og:title', property: 'og:title', content: this.product.name },
                { hid: 'og:description', property: 'og:description', content: this.product.description },
                { hid: 'og:image', property: 'og:image', content: this.product.image },
                { hid: 'og:locale', property: 'og:locale', content: this.$i18n.locale },
                { hid: 'twitter:card', name: 'twitter:card', content: "summary" },
                { hid: 'twitter:site', name: 'twitter:site', content: "homev.az" },
                { hid: 'twitter:title', name: 'twitter:title', content: this.product.name },
                { hid: 'twitter:image', name: 'twitter:image', content: this.product.image },
            ]
        }
    },
    components: {
        Breadcrumbs,
        SectionHeader,
        ProductGallery,
        ProductInfo,
        ProductTags,
        ModalProductView,
    },
    computed: {
        ...mapState({
            breadcrumbs: ({ products }) => products.breadcrumbs,
        }),
        ...mapGetters({
            product: "products/getProduct",
            similarProducts: "products/getSimilarProducts",
            tags: "products/getTags",
        }),
    },
    async asyncData({ store, params }) {
        await Promise.all([
            store.dispatch("products/fetchProductDetails", params.slug),
            store.dispatch("products/fetchSimilarProducts", {
                category: params.category,
                slug: params.slug,
            }),
        ]);
    },
};
</script>
