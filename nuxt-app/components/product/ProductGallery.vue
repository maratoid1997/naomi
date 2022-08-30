<template>
    <client-only>
        <div class="product-gallery">
            <swiper class="swiper gallery-top" :options="galleryOptionsTop" ref="galleryTop">
                <swiper-slide v-for="(image, index) in gallery" :key="index">
                    <div class="product-gallery__image">
                        <img
                            :data-src="image"
                            :alt="`Product image ${index}`"
                            class="swiper-lazy img-contained"
                        />
                        <div class="swiper-lazy-preloader"></div>
                    </div>
                </swiper-slide>
            </swiper>

            <swiper class="swiper gallery-thumbs" :options="galleryOptionsThumbs" ref="galleryThumbs">
                <swiper-slide v-for="(image, index) in gallery" :key="index">
                    <div class="product-gallery__image">
                        <img
                            :data-src="image"
                            :alt="`Product thumb ${index}`"
                            class="swiper-lazy img-contained"
                        />
                        <div class="swiper-lazy-preloader"></div>
                    </div>
                </swiper-slide>
                <div class="swiper-button-prev" slot="button-prev">
                    <i class="icon-angle-left"></i>
                </div>
                <div class="swiper-button-next" slot="button-next">
                    <i class="icon-angle-right"></i>
                </div>
            </swiper>
        </div>
    </client-only>
</template>

<script>
export default {
    props: {
        gallery: {
            type: Array,
            required: true
        }
    },
    data() {
        return {
            galleryOptionsTop: {
                loop: true,
                loopedSlides: 3,
                spaceBetween: 24,
                lazy: {
                    loadPrevNext: true,
                    loadPrevNextAmount: 2,
                    preloadImages: false
                },
            },
            galleryOptionsThumbs: {
                loop: true,
                loopedSlides: 3,
                slidesPerView: 3,
                centeredSlides: true,
                slideToClickedSlide: true,
                lazy: {
                    loadPrevNext: true,
                    loadPrevNextAmount: 2,
                    preloadImages: false
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev'
                },
                breakpoints: {
                    768: {
                        spaceBetween: 24,
                    },
                    300: {
                        spaceBetween: 15,
                    }
                }
            }
        };
    },
    mounted() {
        this.$nextTick(() => {
            setTimeout(() => {
                const galleryTop = this.$refs.galleryTop.$swiper;
                const galleryThumbs = this.$refs.galleryThumbs.$swiper;
                galleryTop.controller.control = galleryThumbs;
                galleryThumbs.controller.control = galleryTop;
            }, 0);
        })
    }
};
</script>
