<template>
    <div>
        <div class="product-info">
            <div class="product-info__header">
                <h1 class="title">{{ product.name }}</h1>

                <div class="actions">
                    <div v-if="isInCart" class="product-count">
                        <button @click="onDecrementCount(product.id)">
                            <i class="icon-minus"></i>
                        </button>
                        <span class="product-count__num">
                            {{ cartProduct.count }}
                        </span>
                        <button @click="onIncrementCount(product.id)">
                            <i class="icon-plus"></i>
                        </button>
                    </div>

                    <template>
                        <button v-if="!isInCart" class="add-to-cart" @click="onAddToCart(product)">
                            <i class="icon-basket"></i>
                        </button>
                        <button v-else class="add-to-cart active" @click="onRemoveFromCart(product.id)">
                            <i class="icon-basket"></i>
                        </button>
                    </template>

                    <template>
                        <button v-if="!isInFavorites" class="add-to-fav" @click="onAddToFavs(product)">
                            <i class="icon-heart"></i>
                        </button>
                        <button v-else class="add-to-fav active" @click="onRemoveFromFavs(product.id)">
                            <i class="icon-heart"></i>
                        </button>
                    </template>
                </div>
                <!-- Header actions -->
            </div>
            <!-- Product info header -->

            <div class="product-info__body">
                <div class="price flex">
                    <template v-if="product.sale_price" >
                        <p class="current" v-html="$calculatePrice(product.sale_price)" />
                        <p class="old" v-html="$calculatePrice(product.price)" />
                    </template>
                    <template v-else>
                        <p class="current" v-html="$calculatePrice(product.price)" />
                    </template>
                </div>

                <div class="params">
                    <p class="param">
                        <strong>{{ $t("brand") }}: </strong>
                        {{ product.brand.name }}
                    </p>
                    <p class="param">
                        <strong>{{ $t("product_code") }}: </strong>
                        {{ product.sku }}
                    </p>
                    <template v-if="product.filters">
                        <p class="param" v-for="(filter, value) in product.filters" :key="value">
                            <strong>{{ value }}: </strong>
                            {{ filter }}
                        </p>
                    </template>
                </div>

                <div class="product-info__body-icons d-flex">
                    <template v-if="product.inStock">
                        <div v-b-tooltip.hover :title="$t('available_in_stock')">
                            <img src="~/assets/images/icons/in-stock.svg">
                        </div>
                    </template>
                    <template v-else>
                        <div v-b-tooltip.hover :title="$t('unavailable_in_stock')">
                            <img src="~/assets/images/icons/not-in-stock.svg">
                        </div>
                    </template>
                    <div v-if="product.sale_price" v-b-tooltip.hover :title="$t('on_sale')">
                        <img src="~/assets/images/icons/sale.svg">
                    </div>
                </div>
            </div>
            <!-- Product info body -->

            <div class="product-info__actions">
                <ul class="share-list">
                    <li class="share-list__item fb">
                        <a
                            target="_blank"
                            class="share-list__link"
                            :href="`https://www.facebook.com/sharer/sharer.php?u=https://homev.az${$route.fullPath}`"
                        >
                            <i class="icon-facebook"></i>
                            <span>facebook</span>
                        </a>
                    </li>
                    <li class="share-list__item tw">
                        <a
                            target="_blank"
                            class="share-list__link"
                            :href="`https://www.twitter.com/share?url=https://homev.az${$route.fullPath}`"
                        >
                            <i class="icon-twitter"></i>
                            <span>twitter</span>
                        </a>
                    </li>
                    <li class="share-list__item wp">
                        <a
                            target="_blank"
                            class="share-list__link"
                            :href="`https://wa.me/?text=https://homev.az${$route.fullPath}`"
                        >
                            <i class="icon-whatsapp"></i>
                            <span>whatsapp</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Product info actions -->
        </div>
        <!-- Product info -->

        <div class="product-details">
            <div class="editor-body" v-html="product.description" />
        </div>
        <!-- Product Details -->
    </div>
</template>

<script>
import { mapGetters } from "vuex";
import ProductActions from "@/mixins/productActions";
import UpdateProductCount from "@/mixins/updateProductCount";

export default {
    props: {
        product: {
            type: Object,
            rqeuired: true
        },
    },
    mixins: [ProductActions, UpdateProductCount],
    computed: {
        ...mapGetters({
            favorites: "favorites/getItems",
            cart: "cart/getItems",
        }),
        isInFavorites() {
            return this.favorites.some((item) => item.id == this.product.id);
        },
        isInCart() {
            return this.cart.some((item) => item.id == this.product.id);
        },
        cartProduct() {
            if (this.isInCart) {
                const index = this.cart.findIndex((item) => item.id == this.product.id);
                return this.cart[index];
            }
        }
    }
};
</script>
