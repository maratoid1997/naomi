<template>
    <client-only>
        <div class="brands-slider" @click="handleBrandClick">
            <b-container fluid>
                <b-row>
                    <b-col>
                        <swiper class="swiper" :options="swiperOptions">
                            <swiper-slide v-for="brand in brands" :key="brand.id">
                                <img
                                    :src="brand.image"
                                    :alt="brand.name"
                                    :data-url="$localePath('brands-id', { id: brand.id })"
                                />
                            </swiper-slide>
                            <div class="swiper-button-prev" slot="button-prev">
                                <i class="icon-angle-left"></i>
                            </div>
                            <div class="swiper-button-next" slot="button-next">
                                <i class="icon-angle-right"></i>
                            </div>
                        </swiper>
                    </b-col>
                </b-row>
            </b-container>
        </div>
    </client-only>
</template>

<script>
import { mapGetters } from "vuex";

export default {
    data() {
        return {
            swiperOptions: {
                loop: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                breakpoints: {
                    1400: {
                        slidesPerView: 7,
                        spaceBetween: 24,
                    },
                    991: {
                        slidesPerView: 6,
                        spaceBetween: 24,
                    },
                    767: {
                        slidesPerView: 4,
                        spaceBetween: 24,
                    },
                    575: {
                        slidesPerView: 3,
                        spaceBetween: 24,
                    },
                    300: {
                        slidesPerView: 2,
                        spaceBetween: 0,
                    },
                },
            },
        };
    },
    computed: {
        ...mapGetters({
            brands: "brands/getBrands",
        }),
    },
    methods: {
        handleBrandClick(e) {
            this.$router.push(e.target.dataset.url);
        }
    }
};
</script>
