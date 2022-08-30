<template>
    <div class="category-cards">
        <b-container fluid>
            <b-row>
                <b-col cols="12">
                    <section-header :title="$t('categories')" />

                    <div class="category-cards-slider">
                        <div v-swiper:swiperInstance="swiperOptions">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide" v-for="category in categories" :key="category.id">
                                    <category-card :category="category" />
                                </div>
                            </div>
                        </div>
                        <div class="swiper-button-prev" @click="prevSlide">
                            <i class="icon-angle-left"></i>
                        </div>
                        <div class="swiper-button-next" @click="nextSlide">
                            <i class="icon-angle-right"></i>
                        </div>
                    </div>
                </b-col>
            </b-row>
        </b-container>
    </div>
</template>

<script>
import SectionHeader from "@/components/ui/SectionHeader";
import CategoryCard from "@/components/products/CategoryCard";

export default {
    props: {
        categories: {
            type: Array,
            default: () => ([])
        }
    },
    components: {
        SectionHeader,
        CategoryCard
    },
    data() {
        return {
            swiperOptions: {
                autoplay: {
                    delay: 7000
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev'
                },
                breakpoints: {
                    1550: {
                        slidesPerView: 8,
                        spaceBetween: 24
                    },
                    1200: {
                        slidesPerView: 6,
                        spaceBetween: 24
                    },
                    991: {
                        slidesPerView: 5,
                        spaceBetween: 24
                    },
                    767: {
                        slidesPerView: 4,
                        spaceBetween: 24
                    },
                    480: {
                        slidesPerView: 3,
                        spaceBetween: 16
                    },
                    300: {
                        slidesPerView: 2,
                        spaceBetween: 16
                    }
                }
            }
        }
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

<style lang="scss">
.category-cards {
    overflow: hidden;

    .category-cards-slider {
        position: relative;
        padding: 2.6rem 6rem;
        margin: -2.6rem -6rem 0 -6rem;
    }

    .swiper-container {
        padding: 1rem;
        margin: -1rem;
        max-height: 30rem;
    }

    .swiper-button-prev,
    .swiper-button-next {
        opacity: 1;

        &.swiper-button-disabled {
            opacity: 0;
        }
    }

    .swiper-button-prev {
        left: 10px;
    }

    .swiper-button-next {
        right: 10px;
    }
}

@media (max-width: 1200px) {
    .category-cards {
        .category-cards-slider {
            padding: 2.6rem 2rem;
            margin: -2.6rem -2rem 0 -2rem;
        }

        .swiper-button-prev {
            left: 25px;
        }

        .swiper-button-next {
            right: 25px;
        }
    }
}
</style>
