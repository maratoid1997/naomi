<template>
    <div class="search-product d-flex align-items-center">
        <div class="search-product__thumb">
            <nuxt-link :to="$localePath('category-slug', {
                category: product.slug && product.slug.split('/')[1],
                slug: product.slug && product.slug.split('/')[2]
            })">
                <img class="img-contained" :src="product.image" :alt="product.name" />
            </nuxt-link>
        </div>

        <div class="search-product__info">
            <nuxt-link class="search-product__name" :to="$localePath('category-slug', {
                category: product.slug && product.slug.split('/')[1],
                slug: product.slug && product.slug.split('/')[2]
            })">
                {{ product.name }}
            </nuxt-link>

            <div class="search-product__price d-flex align-items-center">
                <template v-if="product.sale_price">
                    <p class="old" v-html="$calculatePrice(product.price)" />
                    <p class="current" v-html="$calculatePrice(product.sale_price)" />
                </template>
                <template v-else>
                    <p class="current" v-html="$calculatePrice(product.price)" />
                </template>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "SearchProduct",
    props: {
        product: {
            type: Object,
            default: () => ({
                image: "",
                name: "",
                slug: "",
                price: "",
                sale_price: ""
            })
        }
    }
}
</script>