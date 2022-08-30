<template>
    <section class="firstBanner">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-lg-4 col-xl-4">
                    <div class="firstBanner__wrapper">
                        <div class="firstBanner__wrapper-head">
                            <img src="/img/banners/firstBanner/01.jpg" alt="banner_img">
                        </div>
                        <div class="firstBanner__wrapper-footer">
                            <div class="firstBanner__wrapper-footer-inner">
                                <img src="/icons/banners/firstBanner/01.png" alt="banner_icon">
                                <div class="firstBanner__wrapper-footer-descr">Face Care</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-lg-4 col-xl-4">
                    <div class="firstBanner__wrapper">
                        <div class="firstBanner__wrapper-head">
                            <img src="/img/banners/firstBanner/01.jpg" alt="banner_img">
                        </div>
                        <div class="firstBanner__wrapper-footer">
                            <div class="firstBanner__wrapper-footer-inner">
                                <img src="/icons/banners/firstBanner/02.png" alt="banner_icon">
                                <div class="firstBanner__wrapper-footer-descr">Hair Products</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-lg-4 col-xl-4">
                    <div class="firstBanner__wrapper">
                        <div class="firstBanner__wrapper-head">
                            <img src="/img/banners/firstBanner/01.jpg" alt="banner_img">
                        </div>
                        <div class="firstBanner__wrapper-footer">
                            <div class="firstBanner__wrapper-footer-inner">
                                <img src="/icons/banners/firstBanner/03.png" alt="banner_icon">
                                <div class="firstBanner__wrapper-footer-descr">Hair Products</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>
    .firstBanner {
    margin-top: 50px;
    padding: 0 115px;
    &__wrapper {
        &-head {
            img {
                width: 100%;
            }
        }
        &-footer {
            display: flex;
            justify-content: center;
            &-inner {
                display: flex;
                flex-direction: column;
                align-items: center;
                margin-top: 34px;
                img {
                    width: 90px;
                    height: 90px;
                }
            }
            &-descr {
                margin-top: 10px;
                font-weight: 300;
                font-size: 26px;
                line-height: 33px;
                color: #363B46;
            }
        }
    }
}

    @media (max-width: 1200px) {
        .firstBanner {
            padding: 0;
            &__wrapper {
                &-footer {
                    &-inner {
                        img {
                            width: 70px;
                            height: 70px;
                        }
                    }
                }
            }
        }
    }
    @media (max-width: 992px) {
        .firstBanner {
            &__wrapper {
                &-footer {
                    &-inner {
                        img {
                            width: 50px;
                            height: 50px;
                        }
                    }
                    &-descr {
                        font-size: 22px;
                    }
                }
            }
        }
    }
    @media (max-width: 425px) {
        .firstBanner {
            &__wrapper {
                &-footer {
                    &-inner {
                        margin-top: 20px;
                    }
                    &-descr {
                        margin-top: 5px;
                    }
                }
            }
        }
    }
</style>
