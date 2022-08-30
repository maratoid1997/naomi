<template>
    <div
        class="product-card"
        :class="{
            'product-card_bordered': bordered,
            'product-card_favorite': isInFavorites,
            'product-card_selected': isInCart,
            'product-card_on-sale': product.sale_price
        }"
    >
        <div class="product-card__image">
            <nuxt-link :to="$localePath('category-slug', {
                category: product.slug && product.slug.split('/')[1],
                slug: product.slug && product.slug.split('/')[2]
            })">
                <img class="img-contained" :src="product.image" :alt="product.name" />
            </nuxt-link>
        </div>
        <!-- Product image -->

        <div class="product-card__body">
            <nuxt-link class="product-card__title" :to="$localePath('category-slug', {
                category: product.slug && product.slug.split('/')[1],
                slug: product.slug && product.slug.split('/')[2]
            })">
                {{ product.name | truncate(50) }}
            </nuxt-link>
            <!-- title -->
            <div class="product-card__price">
                <template v-if="product.sale_price" >
                    <span class="old" v-html="$calculatePrice(product.price)" />
                    <span class="current" v-html="$calculatePrice(product.sale_price)" />
                </template>
                <template v-else>
                    <span class="current" v-html="$calculatePrice(product.price)" />
                </template>
            </div>
            <!-- price -->
            <div class="product-card__actions">
                <template>
                    <button
                        v-if="!isInFavorites"
                        @click="_onAddToFavs(product)"
                        class="product-card__action add-to-fav"
                        aria-label="Add to favorites"
                    >
                        <i class="icon-heart"></i>
                    </button>
                    <button
                        v-else
                        @click="_onRemoveFromFavs(product.id)"
                        class="product-card__action add-to-fav"
                        aria-label="Remove from favorites"
                    >
                        <i class="icon-heart"></i>
                    </button>
                </template>
                <template>
                    <button
                        v-if="!isInCart"
                        :disabled="loading"
                        @click="_onAddToCart($event, product)"
                        class="product-card__action add-to-cart"
                        aria-label="Add to cart"
                    >
                        <i class="icon-basket"></i>
                    </button>
                    <button
                        v-else
                        :disabled="loading"
                        @click="onRemoveFromCart(product.id)"
                        class="product-card__action add-to-cart"
                        aria-label="Remove from cart"
                    >
                        <i class="icon-basket"></i>
                    </button>
                </template>
            </div>
            <!-- actions -->
        </div>
        <!-- Product info -->
    </div>
</template>

<script>
import { mapState, mapGetters } from "vuex";
import ProductActions from "@/mixins/productActions";

export default {
    props: {
        product: {
            type: Object,
            default: () => ({
                id: 1,
                image: "_nuxt/assets/images/products/image3.jpg",
                name: "Xüsusi metaldan hazırlanmış məhsul",
                price: 60,
                count: 1,
                slug: "/products/slug"
            }),
        },
        bordered: {
            type: Boolean,
            default: false,
        },
    },
    mixins: [ProductActions],
    computed: {
        ...mapState({
            loading: ({ cart }) => cart.loading
        }),
        ...mapGetters({
            favorites: "favorites/getItems",
            cart: "cart/getItems",
        }),
        isInFavorites() {
            return this.favorites.some((item) => {
                return item.id == this.product.id;
            });
        },
        isInCart() {
            return this.cart.some((item) => {
                return item.id == this.product.id
            });
        },
    },
    methods: {
        _onAddToFavs(product) {
            this.onAddToFavs(product);
        },

        _onRemoveFromFavs(id) {
            this.onRemoveFromFavs(id);
        },

        _onAddToCart(e, product) {
            this.$root.$emit("addToCart", { left: e.clientX, top: e.clientY });
            this.onAddToCart(product)
                .then(() => {
                    this.$bvModal.show("product-modal");
                });
        },
    },
};
</script>
