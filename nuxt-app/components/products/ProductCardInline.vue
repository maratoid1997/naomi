<template>
    <div class="inline-product flex">
        <div class="inline-product__img">
            <img :src="product.image" :alt="product.name">
        </div>
        <div class="inline-product__info">
            <p class="inline-product__title">{{ product.name }}</p>
            <template>
                <div v-if="product.inStock" class="availability is-available">
                    {{ $t("available_in_stock") }}
                </div>
                <div v-else class="availability is-unavailable">
                    {{ $t("unavailable_in_stock") }}
                </div>
            </template>
            <template>
                <p
                    v-if="product.sale_price"
                    class="inline-product__price"
                    v-html="$calculatePrice(product.sale_price)"
                />
                <p
                    v-else
                    class="inline-product__price"
                    v-html="$calculatePrice(product.price)"
                />
            </template>
            <div class="product-count">
                <button @click="onDecrementCount(product.id)">
                    <i class="icon-minus"></i>
                </button>
                <span class="product-count__num">
                    {{ product.count }}
                </span>
                <button @click="onIncrementCount(product.id)">
                    <i class="icon-plus"></i>
                </button>
            </div>
            <!-- <p class="bonus-plus">
                + BonusPlus
                <span v-html="$calculatePrice(21.99)" />
            </p> -->
        </div>
    </div>
</template>

<script>
import UpdateProductCount from "@/mixins/updateProductCount";

export default {
    props: {
        product: {
            type: Object,
            required: true
        }
    },
    mixins: [UpdateProductCount]
};
</script>
