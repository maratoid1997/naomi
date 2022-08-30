<template>
    <b-modal centered hide-footer size="xl" id="product-modal" :title="$t('added_to_cart')">
        <div class="modal-cart flex">
            <user-cart />
            <button class="continue" @click="continueShopping">
                {{ $t("continue_shopping") }}
                <i class="icon-arrow-right"></i>
            </button>
        </div>

        <div class="modal-body-content">
            <div class="left">
                <product-card-inline :product="product" />

                <nuxt-link class="btn btn-primary" :to="$localePath('/checkout')">
                    {{ $t("checkout") }}
                </nuxt-link>
            </div>
            <!-- Left -->

            <div class="right">
                <fast-buy :product="product" />
            </div>
            <!-- Right -->
        </div>
    </b-modal>
</template>

<script>
import { mapGetters } from "vuex";
import UserCart from "@/components/ui/UserCart";
import FastBuy from "@/components/ui/FastBuy";
import ProductCardInline from "@/components/products/ProductCardInline";

export default {
    components: {
        UserCart,
        FastBuy,
        ProductCardInline,
    },
    computed: {
        ...mapGetters({
            product: "cart/getItem",
        }),
    },
    methods: {
        continueShopping() {
            this.$bvModal.hide("product-modal");
            this.$root.$emit("continueShopping");
        },
    },
    created() {
        this.$root.$on("bv::modal::hidden", () => {
            setTimeout(() => {
                this.$store.commit("cart/CLEAR_ITEM");
            }, 300);
        });
    },
};
</script>
