<template>
    <section class="sliderSpecialOffers">
        <swiper class="swiper" :options="swiperOptions">
            <swiper-slide>
                <div class="swiper__inner">
                    <div class="swiper__inner-left">
                        <h2 class="swiper__inner-left-title">Xüsusi Təklif</h2>
                        <h3 class="swiper__inner-left-description">Ən yeni kosmetik məhsullar</h3>
                        <a class="swiper__inner-left-btn" href="#0">
                            <span>Ətraflı</span>
                            <img src="/icons/Slider_specialOffers/right-arrow.svg" alt="arrow_icon">
                        </a>
                    </div>
                    <div class="swiper__inner-right">
                        <img src="/img/Slider_specialOffers/slider_01.jpg" alt="slider_01">
                    </div>
                </div>
            </swiper-slide>

            <swiper-slide>
                <img src="/img/Slider_specialOffers/slider_01.jpg" alt="">
            </swiper-slide>

            <swiper-slide>
                <img src="/img/Slider_specialOffers/slider_01.jpg" alt="">
            </swiper-slide>

            <div class="swiper-pagination" slot="pagination"></div>

            <div class="swiper-button-prev" slot="button-prev">
                <img src="/icons/Slider_specialOffers/sliderIcon_left.svg" alt="">
            </div>

            <div class="swiper-button-next" slot="button-next">
                <img src="/icons/Slider_specialOffers/sliderIcon_right.svg" alt="">
            </div>

        </swiper>
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
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            },
        };
    },
}
</script>

<style lang="scss" scoped>
    .swiper {
    width: 100%;
    height: 500px;
    &__inner {
        display: flex;
        height: 100%;
        &-left {
            width: 573px;
            height: 100%;
            padding: 145px 126px 145px 115px;
            background-color: #F8ECEC;
            &-title {
                font-weight: 500;
                font-size: 70px;
                line-height: 90px;
                color: #6C8685;
                margin-bottom: 0;
            }
            &-description {
                font-weight: 300;
                font-size: 26px;
                line-height: 33px;
                color: #363B46;
                margin-bottom: 0;
            }
            &-btn {
                display: flex;
                align-items: center;
                margin-top: 42px;
                width: 123px;
                height: 42px;
                padding: 0 30px;
                border: 1px solid rgba(108, 134, 133, 0.7);
                border-radius: 100px;
                outline: none;
                text-decoration: none;
                span {
                    font-weight: normal;
                    line-height: 21px;
                    color: #6C8685;
                }
                img {
                    width: 15px;
                    height: 10px;
                    margin-left: 8px;
                }
            }
        }
        &-right {
            width: 1357px;
            height: 100%;
            img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
        }
    }
    .swiper-button-prev {
        left: 37px;
        &:after {
            content: unset;
        }
    }
    .swiper-button-next {
        right: 37px;
        &:after {
            content: unset;
        }
    }
}

    @media (max-width: 1850px) {
        .swiper {
            &__inner {
                &-left {
                    padding: 145px 40px 145px 100px;
                }
            }
        }
    }
    @media (max-width: 1760px) {
        .swiper {
            &__inner {
                &-left {
                    width: 30%;
                }
                &-right {
                    width: 70%;
                }
            }
        }
    }
    @media (max-width: 1280px) {
        .swiper {
            &__inner {
                &-left {
                    width: 40%;
                    &-title {
                        font-size: 60px;
                        line-height: 70px;
                    }
                    &-description {
                        font-size: 24px;
                        line-height: 30px;
                    }
                    &-btn {
                        margin-top: 35px;
                    }
                }
                &-right {
                    width: 60%;
                }
            }
        }
    }
    @media (max-width: 992px) {
        .swiper {
            &__inner {
                &-left {
                    width: 40%;
                    padding: 145px 40px 145px 40px;
                }
                &-right {
                    width: 60%;
                }
            }
            .swiper-button-prev, .swiper-button-next {
                display: none;
            }
        }
    }
    @media (max-width: 768px) {
        .swiper {
            height: 600px;
            &__inner {
                flex-direction: column;
                &-left {
                    width: 100%;
                    height: 50%;
                    padding: 80px 40px;
                }
                &-right {
                    width: 100%;
                    height: 50%;
                }
            }
        }
    }
    @media (max-width: 375px) {
        .swiper {
            &__inner {
                &-left {
                    padding: 80px 30px;
                }
            }
        }
    }
</style>
