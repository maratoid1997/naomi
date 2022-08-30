<template>
    <div class="hero-slider" v-swiper="swiperOptions">
        <div class="swiper-wrapper">
            <div class="swiper-slide hero-slide" v-for="slide in hero" :key="slide.id">
                <div class="hero-slide__image">
                    <img class="swiper-lazy" :data-src="slide.image" :alt="slide.title" />
                    <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                </div>
                <div class="hero-slide__content">
                    <h1 class="title">{{ slide.title }}</h1>
                    <h2 class="subtitle">{{ slide.description }}</h2>
                    <a class="btn btn-outline-light" :href="slide.url" rel="noopener" target="_blank">
                        {{ $t("learn_more") }}
                        <i class="icon-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="swiper-pagination" slot="pagination"></div>
    </div>
</template>

<script>
export default {
    props: {
        hero: {
            type: Array,
            required: true,
        },
    },
    data() {
        return {
            swiperOptions: {
                lazy: {
                    loadPrevNext: true,
                    loadPrevNextAmount: 2,
                    preloadImages: false,
                },
                autoplay: {
                    delay: 7000,
                    disableOnInteraction: false
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
            },
        };
    },
};
</script>
