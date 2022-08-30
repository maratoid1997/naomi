<template>
    <div class="data-table products-table">
        <b-overlay :show="isLoading" no-wrap />
        <table>
            <thead>
                <tr>
                    <th>{{ $t("product.image") }}</th>
                    <th>{{ $t("product.name") }}</th>
                    <th>{{ $t("product.model") }}</th>
                    <th>{{ $t("product.count") }}</th>
                    <th>{{ $t("product.price") }}</th>
                    <th>{{ $t("product.remove") }}</th>
                </tr>
            </thead>
            <tbody>
                <template v-if="products.length == 0">
                    <tr>
                        <td colspan="7" class="text-center">
                            {{ $t("empty_cart") }}
                        </td>
                    </tr>
                </template>
                <template v-else>
                    <tr v-for="product in products" :key="product.id">
                        <td>
                            <div class="data-image">
                                <img :src="product.image" alt="Product image" />
                            </div>
                        </td>
                        <td>
                            <p class="data-name">{{ product.name }}</p>
                        </td>
                        <td>
                            <p class="data-model">{{ product.sku }}</p>
                        </td>
                        <td>
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
                        </td>
                        <td>
                            <p
                                v-if="product.sale_price"
                                class="data-price"
                                v-html="$calculatePrice(product.sale_price)"
                            />
                            <p
                                v-else
                                class="data-price"
                                v-html="$calculatePrice(product.price)"
                            />
                        </td>
                        <td>
                            <button
                                @click="onRemoveProduct(product.id)"
                                class="remove-data"
                            >
                                <i class="icon-trash"></i>
                            </button>
                        </td>
                    </tr>
                </template>
            </tbody>
        </table>
    </div>
</template>

<script>
import { mapState } from "vuex";
import UpdateProductCount from "@/mixins/updateProductCount";

export default {
    props: {
        products: {
            type: Array,
            default: []
        }
    },
    mixins: [UpdateProductCount],
    computed: {
        ...mapState({
            isLoading: "loading",
            taxes: (state) => state.cart.taxes
        })
    },
    methods: {
        onRemoveProduct(id) {
            if (this.$auth.user) {
                return this.$store.dispatch("cart/removeFromCart", id);
            } else {
                return this.$store.dispatch("cart/removeFromCookieCart", id);
            }
        }
    }
};
</script>
