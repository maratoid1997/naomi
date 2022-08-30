<template>
    <section class="sliderBrands">
        <swiper ref="slider" class="swiperProduct" :options="swiperOptions">
            <swiper-slide>
                <div>
                    <img class="sliderBrands__img" src="/img/sliderBrands/slide_01.jpg" alt="slide">
                </div>
            </swiper-slide>

            <swiper-slide>
                <div>
                    <img class="sliderBrands__img" src="/img/sliderBrands/slide_02.jpg" alt="slide">
                </div>
            </swiper-slide>

            <swiper-slide>
                <div>
                    <img class="sliderBrands__img" src="/img/sliderBrands/slide_03.jpg" alt="slide">
                </div>
            </swiper-slide>

            <swiper-slide>
                <div>
                    <img class="sliderBrands__img" src="/img/sliderBrands/slide_04.jpg" alt="slide">
                </div>
            </swiper-slide>

            <swiper-slide>
                <div>
                    <img class="sliderBrands__img" src="/img/sliderBrands/slide_05.jpg" alt="slide">
                </div>
            </swiper-slide>

            <swiper-slide>
                <div>
                    <img class="sliderBrands__img" src="/img/sliderBrands/slide_06.jpg" alt="slide">
                </div>
            </swiper-slide>

            <swiper-slide>
                <div>
                    <img class="sliderBrands__img" src="/img/sliderBrands/slide_07.jpg" alt="slide">
                </div>
            </swiper-slide>

            <swiper-slide>
                <div>
                    <img class="sliderBrands__img" src="/img/sliderBrands/slide_08.jpg" alt="slide">
                </div>
            </swiper-slide>

            <swiper-slide>
                <div>
                    <img class="sliderBrands__img" src="/img/sliderBrands/slide_01.jpg" alt="slide">
                </div>
            </swiper-slide>

            <swiper-slide>
                <div>
                    <img class="sliderBrands__img" src="/img/sliderBrands/slide_02.jpg" alt="slide">
                </div>
            </swiper-slide>

            <swiper-slide>
                <div>
                    <img class="sliderBrands__img" src="/img/sliderBrands/slide_03.jpg" alt="slide">
                </div>
            </swiper-slide>

<!--            <div class="swiper-button-prev" slot="button-prev">-->
<!--                <img src="/icons/Slider_specialOffers/sliderIcon_left.svg" alt="">-->
<!--            </div>-->

<!--            <div class="swiper-button-next" slot="button-next">-->
<!--                <img src="/icons/Slider_specialOffers/sliderIcon_right.svg" alt="">-->
<!--            </div>-->
        </swiper>

        <div class="swiper-button-prev-custom" @click="$refs.slider.$swiper.slidePrev()">
            <img src="/icons/Slider_specialOffers/sliderIcon_left.svg" alt="slider_arrow">
        </div>
        <div class="swiper-button-next-custom" @click="$refs.slider.$swiper.slideNext()">
            <img src="/icons/Slider_specialOffers/sliderIcon_right.svg" alt="slider_arrow">
        </div>
    </section>
</template>

<script>
import {Swiper, SwiperSlide} from 'vue-awesome-swiper';
import 'swiper/css/swiper.css';

export default {
    components: {
        Swiper,
        SwiperSlide
    },
    data() {
        return {
            swiperOptions: {
                slidesPerView: 8,
                breakpoints: {
                    320: {
                        slidesPerView: 1.5,
                    },
                    375: {
                        slidesPerView: 1.7,
                    },
                    500: {
                        slidesPerView: 2.3,
                    },
                    600: {
                        slidesPerView: 2.6,
                    },
                    700: {
                        slidesPerView: 3,
                    },
                    768: {
                        slidesPerView: 3.3,
                    },
                    820: {
                        slidesPerView: 3.6,
                    },
                    920: {
                        slidesPerView: 4.3,
                    },
                    1060: {
                        slidesPerView: 4.6,
                    },
                    1200: {
                        slidesPerView: 5,
                    },
                    1260: {
                        slidesPerView: 5.4,
                    },
                    1360: {
                        slidesPerView: 5.8,
                    },
                    1420: {
                        slidesPerView: 6.4,
                    },
                    1530: {
                        slidesPerView: 6.7,
                    },
                    1620: {
                        slidesPerView: 7.3,
                    },
                    1700: {
                        slidesPerView: 7.6,
                    },
                    1800: {
                        slidesPerView: 8,
                    },
                },
            },
        };
    },
}
</script>

<style lang="scss" scoped>
    .sliderBrands {
     position: relative;
     margin-top: 50px;
     &__img {
         width: 190px;
         height: 142.5px;
     }
     .swiper-button-prev-custom, .swiper-button-next-custom {
         position: absolute;
         top: 50%;
         transform: translateY(-50%);
         z-index: 2;
         cursor: pointer;
         display: none;
     }
     .swiper-button-prev-custom {
         left: 118px;
     }
     .swiper-button-next-custom {
         right: 118px;
     }
 }

    @media (min-width: 320px) {
        .sliderBrands {
            padding: 0 15px;
        }
    }
    @media (min-width: 1024px) {
        .sliderBrands {
            padding: 0 45px;
        }
    }
    @media (min-width: 1920px) {
        .sliderBrands {
            padding: 0 200px;
            .swiper-button-prev-custom, .swiper-button-next-custom {
                display: block;
            }
        }
    }
</style>
