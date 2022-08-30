<template>
    <section class="product">
        <div class="container">
            <div class="product__inner">
                <div class="product__left">
                    <product-info-gallery/>
                </div>
                <div class="product__right">
                    <product-info-details/>
                </div>
            </div>
            <div class="product__content">
                <h2 class="product__content-title">Oxşar məhsullar</h2>
                <div class="products">
                    <product v-for="i in 5" :key="i"/>
                </div>
            </div>
            <div class="product__content">
                <h2 class="product__content-title">Oxşar məhsullar</h2>
                <div class="products">
                    <product v-for="i in 5" :key="i"/>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import ProductInfoGallery from "@/components/maratoid/products/ProductInfoGallery";
import ProductInfoDetails from "@/components/maratoid/products/ProductInfoDetails";
import Product from "../../components/maratoid/products/Product";

export default {
    components: {
        ProductInfoGallery,
        ProductInfoDetails,
        Product,
    }
}
</script>

<style lang="scss" scoped>
    .product {
        &__inner {
            display: flex;
            justify-content: space-between;
            margin-top: 18px;
        }
        &__left {
            width: 546px;
        }
        &__right {
            width: 1116px;
        }
        &__content {
            margin-top: 42px;
            &-title {
                font-weight: 500;
                font-size: 25px;
                line-height: 32px;
                color: #363B46;
                margin-bottom: 28px;
            }
            .products {
                display: flex;
                justify-content: space-between;
                flex-wrap: wrap;
            }
            .product {
                margin-left: 0;
            }
        }
    }
</style>
