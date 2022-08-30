<template>
    <section class="secondBanner">
        <div class="secondBanner__left">
            <img src="/img/banners/secondBanner/img_01.jpg" alt="banner">
        </div>
        <div class="secondBanner__right">
            <div class="secondBanner__right-head">
                <img src="/img/banners/secondBanner/img_02.jpg" alt="banner">
            </div>
            <div class="secondBanner__right-footer">
                <img src="/img/banners/secondBanner/img_03.jpg" alt="banner">
            </div>
        </div>
    </section>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>
    .secondBanner {
        display: flex;
        justify-content: space-between;
        margin-top: 50px;
        width: 100%;
        height: 500px;
        padding: 0 115px;
        &__left {
            //width: 832px;
            width: 50%;
            height: 100%;
            img {
                border-radius: 10px;
            }
        }
        &__right {
            display: flex;
            //justify-content: space-between;
            align-items: flex-end;
            flex-direction: column;
            //width: 832px;
            width: 50%;
            height: 100%;
            &-head, &-footer {
                border-radius: 10px;
                overflow: hidden;
                max-width: 832px;
                height: 238px;
            }
            &-footer {
                margin-top: 24px;
            }
            img {
                border-radius: 10px;
            }
        }
        img {
            width: 100%;
            height: 100%;
        }
    }

    @media (max-width: 1920px) {
        .secondBanner {
            padding: 0 45px;
        }
    }
    @media (max-width: 1790px) {
        .secondBanner {
            height: 480px;
        }
    }
    @media (max-width: 1725px) {
        .secondBanner {
            height: 460px;
        }
    }
    @media (max-width: 1650px) {
        .secondBanner {
            height: 440px;
        }
    }
    @media (max-width: 1580px) {
        .secondBanner {
            height: 420px;
        }
    }
    @media (max-width: 1505px) {
        .secondBanner {
            height: 400px;
        }
    }
    @media (max-width: 1430px) {
        .secondBanner {
            height: 380px;
        }
    }
    @media (max-width: 1370px) {
        .secondBanner {
            height: 360px;
        }
    }
    @media (max-width: 1305px) {
        .secondBanner {
            height: 340px;
        }
    }
    @media (max-width: 1235px) {
        .secondBanner {
            height: 320px;
        }
    }
    @media (max-width: 1160px) {
        .secondBanner {
            height: 300px;
        }
    }
    @media (max-width: 1095px) {
        .secondBanner {
            height: 280px;
        }
    }
    @media (max-width: 1025px) {
        .secondBanner {
            padding: 0 15px;
        }
    }
    @media (max-width: 966px) {
        .secondBanner {
            height: 260px;
        }
    }
    @media (max-width: 890px) {
        .secondBanner {
            height: 240px;
        }
    }
    @media (max-width: 820px) {
        .secondBanner {
            height: 220px;
        }
    }
    @media (max-width: 768px) {
        .secondBanner {
            flex-direction: column;
            height: 850px;
            &__left, &__right {
                width: 100%;
                height: 400px;
            }
            &__right {
                &-head, &-footer {
                    width: 100%;
                }
            }
        }
    }
    @media (max-width: 576px) {
        .secondBanner {
            height: 760px;
            &__left, &__right {
                img {
                    object-fit: cover;
                }
            }
            &__left {
                height: 300px;
            }
        }
    }
</style>
