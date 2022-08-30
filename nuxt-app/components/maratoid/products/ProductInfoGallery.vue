<template>
    <div class="ProductInfoGallery">
        <div class="ProductInfoGallery__head">
            <img src="/icons/sliderProduct/icon_01.png" alt="product_img">
        </div>
        <div class="ProductInfoGallery__footer">
            <swiper class="ProductInfoGallery__slider" :options="swiperOptions">
                <swiper-slide v-for="i in 5" :key="i">
                    <div class="ProductInfoGallery__sliderWrapper">
                        <img class="ProductInfoGallery__sliderImg" src="/icons/SliderProductInfo/01.png" alt="slide">
                    </div>
                </swiper-slide>

                <div class="swiper-button-prev" slot="button-prev">
                    <img src="/icons/Slider_specialOffers/sliderIcon_left.svg" alt="icon_prev">
                </div>
                <div class="swiper-button-next" slot="button-next">
                    <img src="/icons/Slider_specialOffers/sliderIcon_right.svg" alt="icon_next">
                </div>
            </swiper>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            swiperOptions: {
                slidesPerView: 3,
                spaceBetween: 24,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                // breakpoints: {
                //     320: {
                //         slidesPerView: 1.5,
                //     },
                // },
            },
        }
    }
}
</script>

<style lang="scss" scoped>
    .ProductInfoGallery {
        display: flex;
        justify-content: space-between;
        flex-direction: column;
        width: 546px;
        height: 736px;
        &__head {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 546px;
            padding: 20px;
            border: 1px solid #E9EBEF;
            border-radius: 10px;
            overflow: hidden;
            img {
                width: 160px;
                height: 425px;
            }
        }
        &__footer {
            width: 100%;
            height: 166px;
        }
        &__sliderWrapper {
            width: 166px;
            height: 166px;
            border: 1px solid #E9EBEF;
            border-radius: 10px;
        }
        &__sliderImg {
            width: 100%;
            height: 100%;
        }
        .swiper-button-prev, .swiper-button-next {
            width: 32px;
            height: 32px;
            &:after {
                content: unset;
            }
        }
    }
</style>
