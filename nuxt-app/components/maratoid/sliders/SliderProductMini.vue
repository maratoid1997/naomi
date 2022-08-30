<template>
    <section class="sliderProductMini">
        <swiper ref="slider" class="swiperProductMini" :options="swiperOptions">
            <swiper-slide>
                <div class="swiperProductMini__content">
                    <img class="swiperProductMini__content-icon" src="/icons/sliderProductMini/icon_01.svg" alt="slider_icon">
                    <div class="swiperProductMini__content-descr">Foam for washing</div>
                </div>
            </swiper-slide>

            <swiper-slide>
                <div class="swiperProductMini__content">
                    <img class="swiperProductMini__content-icon" src="/icons/sliderProductMini/icon_02.svg" alt="slider_icon">
                    <div class="swiperProductMini__content-descr">Face creams</div>
                </div>
            </swiper-slide>

            <swiper-slide>
                <div class="swiperProductMini__content">
                    <img class="swiperProductMini__content-icon" src="/icons/sliderProductMini/icon_03.svg" alt="slider_icon">
                    <div class="swiperProductMini__content-descr">Serums</div>
                </div>
            </swiper-slide>

            <swiper-slide>
                <div class="swiperProductMini__content">
                    <img class="swiperProductMini__content-icon" src="/icons/sliderProductMini/icon_04.svg" alt="slider_icon">
                    <div class="swiperProductMini__content-descr">Peelings</div>
                </div>
            </swiper-slide>

            <swiper-slide>
                <div class="swiperProductMini__content">
                    <img class="swiperProductMini__content-icon" src="/icons/sliderProductMini/icon_05.svg" alt="slider_icon">
                    <div class="swiperProductMini__content-descr">Sunscreen</div>
                </div>
            </swiper-slide>

            <swiper-slide>
                <div class="swiperProductMini__content">
                    <img class="swiperProductMini__content-icon" src="/icons/sliderProductMini/icon_06.svg" alt="slider_icon">
                    <div class="swiperProductMini__content-descr">Face masks</div>
                </div>
            </swiper-slide>

            <swiper-slide>
                <div class="swiperProductMini__content">
                    <img class="swiperProductMini__content-icon" src="/icons/sliderProductMini/icon_07.svg" alt="slider_icon">
                    <div class="swiperProductMini__content-descr">Cloth masks</div>
                </div>
            </swiper-slide>

            <swiper-slide>
                <div class="swiperProductMini__content">
                    <img class="swiperProductMini__content-icon" src="/icons/sliderProductMini/icon_08.svg" alt="slider_icon">
                    <div class="swiperProductMini__content-descr">Hydrogel Patches</div>
                </div>
            </swiper-slide>

            <swiper-slide>
                <div class="swiperProductMini__content">
                    <img class="swiperProductMini__content-icon" src="/icons/sliderProductMini/icon_03.svg" alt="slider_icon">
                    <div class="swiperProductMini__content-descr">Serums</div>
                </div>
            </swiper-slide>

            <swiper-slide>
                <div class="swiperProductMini__content">
                    <img class="swiperProductMini__content-icon" src="/icons/sliderProductMini/icon_04.svg" alt="slider_icon">
                    <div class="swiperProductMini__content-descr">Peelings</div>
                </div>
            </swiper-slide>

            <swiper-slide>
                <div class="swiperProductMini__content">
                    <img class="swiperProductMini__content-icon" src="/icons/sliderProductMini/icon_05.svg" alt="slider_icon">
                    <div class="swiperProductMini__content-descr">Sunscreen</div>
                </div>
            </swiper-slide>

            <swiper-slide>
                <div class="swiperProductMini__content">
                    <img class="swiperProductMini__content-icon" src="/icons/sliderProductMini/icon_06.svg" alt="slider_icon">
                    <div class="swiperProductMini__content-descr">Face masks</div>
                </div>
            </swiper-slide>

            <swiper-slide>
                <div class="swiperProductMini__content">
                    <img class="swiperProductMini__content-icon" src="/icons/sliderProductMini/icon_07.svg" alt="slider_icon">
                    <div class="swiperProductMini__content-descr">Cloth masks</div>
                </div>
            </swiper-slide>

            <swiper-slide>
                <div class="swiperProductMini__content">
                    <img class="swiperProductMini__content-icon" src="/icons/sliderProductMini/icon_08.svg" alt="slider_icon">
                    <div class="swiperProductMini__content-descr">Hydrogel Patches</div>
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
                spaceBetween: 24,
                breakpoints: {
                    320: {
                      slidesPerView: 1.5,
                    },
                    340: {
                      slidesPerView: 1.6,
                    },
                    375: {
                      slidesPerView: 1.7,
                    },
                    410: {
                      slidesPerView: 1.9,
                    },
                    440: {
                      slidesPerView: 2,
                    },
                    475: {
                      slidesPerView: 2.3,
                    },
                    520: {
                      slidesPerView: 2.5,
                    },
                    550: {
                      slidesPerView: 2.6,
                    },
                    600: {
                      slidesPerView: 2.9,
                    },
                    650: {
                      slidesPerView: 3,
                    },
                    700: {
                      slidesPerView: 3.4,
                    },
                    768: {
                      slidesPerView: 3.6,
                    },
                    800: {
                      slidesPerView: 3.8,
                    },
                    855: {
                      slidesPerView: 4,
                    },
                    900: {
                      slidesPerView: 4.4,
                    },
                    1000: {
                      slidesPerView: 4.7,
                    },
                    1090: {
                      slidesPerView: 4.8,
                    },
                    1140: {
                      slidesPerView: 5,
                    },
                    1180: {
                      slidesPerView: 5.3,
                    },
                    1260: {
                      slidesPerView: 5.6,
                    },
                    1350: {
                      slidesPerView: 6,
                    },
                    1430: {
                      slidesPerView: 6.4,
                    },
                    1500: {
                      slidesPerView: 6.8,
                    },
                    1560: {
                      slidesPerView: 7,
                    },
                    1650: {
                      slidesPerView: 7.4,
                    },
                    1740: {
                      slidesPerView: 7.7,
                    },
                    1800: {
                      slidesPerView: 8,
                        spaceBetween: 22
                    },
                },
            },
        };
    },
}
</script>

<style lang="scss" scoped>
    .sliderProductMini {
        position: relative;
        margin-top: 41px;
        .swiperProductMini__content {
            width: 189px;
            height: 114px;
            padding: 23px 10px 20px 10px;
            border: 1px solid #E9EBEF;
            border-radius: 10px;
            text-align: center;
            &-descr {
                margin-top: 7px;
            }
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
            left: 37px;
        }
        .swiper-button-next-custom {
            right: 37px;
        }
    }

    @media (min-width: 320px ) {
      .sliderProductMini {
        padding: 0 15px;
      }
    }
    @media (min-width: 1024px ) {
      .sliderProductMini {
        padding: 0 45px;
      }
    }
    @media (min-width: 1920px ) {
      .sliderProductMini {
        padding: 0 115px;
        .swiper-button-prev-custom, .swiper-button-next-custom {
          display: block;
        }
      }
    }
</style>
