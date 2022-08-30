<template>
    <div class="products-slider">
        <b-container fluid>
            <b-row>
                <b-col>
                    <slot></slot>
                    <div v-swiper:swiperInstance="swiperOptions">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide" v-for="product in products" :key="product.id">
                                <product-card :product="product" />
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </b-col>
            </b-row>
            <div class="swiper-button-prev" @click="prevSlide">
                <i class="icon-angle-left"></i>
            </div>
            <div class="swiper-button-next" @click="nextSlide">
                <i class="icon-angle-right"></i>
            </div>
        </b-container>
    </div>
</template>

<script>
import ProductCard from "@/components/products/ProductCard";

export default {
    components: {
        ProductCard,
    },
    props: {
        products: {
            type: Array,
            default: () => [
                {
                    id: 1,
                    image: "/_nuxt/assets/images/products/image3.jpg",
                    name: "Xüsusi metaldan hazırlanmış məhsul",
                    price: 60,
                    count: 1,
                    isFavorite: false,
                },
            ],
        },
    },
    data() {
        return {
            swiperOptions: {
                pagination: {
                    el: ".swiper-pagination",
                },
                breakpoints: {
                    1200: {
                        slidesPerView: 5,
                        spaceBetween: 24,
                    },
                    992: {
                        slidesPerView: 4,
                        spaceBetween: 24,
                    },
                    767: {
                        slidesPerView: 3,
                        spaceBetween: 24,
                    },
                    300: {
                        slidesPerView: 2,
                        spaceBetween: 15,
                    },
                },
            },
        };
    },
    methods: {
        prevSlide() {
            this.swiperInstance.slidePrev();
        },
        nextSlide() {
            this.swiperInstance.slideNext();
        },
    },
};
</script>
