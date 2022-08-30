<template>
    <div class="brandsWrapper">
        <div class="container">
            <div class="brands">
                <div class="brand">
                    <img class="brand__img" src="/img/brands/brand_01.png" alt="brand_img">
                </div>
                <div class="brand">
                    <img class="brand__img" src="/img/brands/brand_02.png" alt="brand_img">
                </div>
                <div class="brand">
                    <img class="brand__img" src="/img/brands/brand_03.png" alt="brand_img">
                </div>
                <div class="brand">
                    <img class="brand__img" src="/img/brands/brand_04.png" alt="brand_img">
                </div>
                <div class="brand">
                    <img class="brand__img" src="/img/brands/brand_05.png" alt="brand_img">
                </div>
                <div class="brand">
                    <img class="brand__img" src="/img/brands/brand_05.png" alt="brand_img">
                </div>
                <div class="brand">
                    <img class="brand__img" src="/img/brands/brand_05.png" alt="brand_img">
                </div>
                <div class="brand">
                    <img class="brand__img" src="/img/brands/brand_05.png" alt="brand_img">
                </div>
                <div class="brand">
                    <img class="brand__img" src="/img/brands/brand_05.png" alt="brand_img">
                </div>
                <div class="brand">
                    <img class="brand__img" src="/img/brands/brand_05.png" alt="brand_img">
                </div>
                <div class="brand">
                    <img class="brand__img" src="/img/brands/brand_05.png" alt="brand_img">
                </div>
                <div class="brand">
                    <img class="brand__img" src="/img/brands/brand_05.png" alt="brand_img">
                </div>
                <div class="brand">
                    <img class="brand__img" src="/img/brands/brand_05.png" alt="brand_img">
                </div>
                <div class="brand">
                    <img class="brand__img" src="/img/brands/brand_05.png" alt="brand_img">
                </div>
                <div class="brand">
                    <img class="brand__img" src="/img/brands/brand_05.png" alt="brand_img">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>
    .brandsWrapper {
        .brands {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            margin-top: 19px;
            .brand {
                display: flex;
                justify-content: center;
                align-items: center;
                width: 318px;
                padding: 44px 64px;
                border: 1px solid #E9EBEF;
                border-radius: 10px;
                margin-bottom: 24px;
                margin-right: 19px;
                &__img {
                    width: 190px;
                    height: 143px;
                }
            }
        }
    }

    @media (max-width: 1200px) {
        .brandsWrapper {
            .brands {
                justify-content: space-around;
            }
        }
    }
    @media (max-width: 768px) {
        .brandsWrapper {
            .container {
                max-width: 710px;
                .brand {
                    width: 265px;
                }
            }
        }

    }
    @media (max-width: 600px) {
        .brandsWrapper {
            .container {
                .brands {
                    justify-content: space-between;
                }
                .brand {
                    width: 220px;
                    padding: 20px 40px;
                }
            }
        }

    }
    @media (max-width: 510px) {
        .brandsWrapper {
            .container {
                .brand {
                    width: 200px;
                    padding: 10px;
                    margin-right: 0;
                    img {
                        width: 100%;
                        height: 100%;
                    }
                }
            }
        }

    }
    @media (max-width: 470px) {
        .brandsWrapper {
            .container {
                .brand {
                    width: 190px;
                }
            }
        }

    }
    @media (max-width: 430px) {
        .brandsWrapper {
            .container {
                .brand {
                    width: 170px;
                }
            }
        }

    }
    @media (max-width: 385px) {
        .brandsWrapper {
            .container {
                .brand {
                    width: 160px;
                }
            }
        }

    }
    @media (max-width: 360px) {
        .brandsWrapper {
            .container {
                .brand {
                    width: 140px;
                }
            }
        }

    }
</style>
