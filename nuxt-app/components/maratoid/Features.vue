<template>
    <section class="features">
        <div class="features__wrapper">
            <div class="features__content">
                <div class="features__content-left">
                    <img src="/icons/features/icon_01.svg" alt="icon">
                </div>
                <div class="features__content-right">
                    <div class="features__content-right-title">Sürətli çatdırılma</div>
                    <div class="features__content-right-descr">Ölkə daxili</div>
                </div>
            </div>
            <div class="features__content">
                <div class="features__content-left">
                    <img src="/icons/features/icon_02.svg" alt="icon">
                </div>
                <div class="features__content-right">
                    <div class="features__content-right-title">Onlayn dəstək</div>
                    <div class="features__content-right-descr">Saatlar: 09:00 - 18:00</div>
                </div>
            </div>
            <div class="features__content">
                <div class="features__content-left">
                    <img src="/icons/features/icon_03.svg" alt="icon">
                </div>
                <div class="features__content-right">
                    <div class="features__content-right-title">Yüksək keyfiyyət</div>
                    <div class="features__content-right-descr">Keyfiyyətli məhsullar</div>
                </div>
            </div>
            <div class="features__content">
                <div class="features__content-left">
                    <img src="/icons/features/icon_04.svg" alt="icon">
                </div>
                <div class="features__content-right">
                    <div class="features__content-right-title">Geri ödəmə</div>
                    <div class="features__content-right-descr">Bir neçə gün ərzində</div>
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
    .features {
        margin-top: 50px;
        padding: 0 115px;
        &__wrapper {
            display: flex;
            justify-content: space-between;
        }
        &__content {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 403px;
            height: 87px;
            padding: 20px 20px 17px 20px;
            border: 1px solid #E9EBEF;
            border-radius: 10px;
            &-right {
                margin-left: 20px;
                &-title {
                    font-weight: normal;
                    font-size: 18px;
                    line-height: 23px;
                    color: #2C5B5A;
                }
                &-descr {
                    font-weight: 300;
                    font-size: 17px;
                    line-height: 22px;
                    color: #2C5B5A;
                    opacity: 0.7;
                }
            }
        }
    }

    @media (max-width: 1920px) {
        .features {
            padding: 0 45px;
        }
    }
    @media (max-width: 1750px) {
        .features {
            &__content {
                width: 380px;
            }
        }
    }
    @media (max-width: 1665px) {
        .features {
            &__content {
                width: 360px;
            }
        }
    }
    @media (max-width: 1595px) {
        .features {
            &__content {
                width: 340px;
            }
        }
    }
    @media (max-width: 1515px) {
        .features {
            &__content {
                width: 320px;
            }
        }
    }
    @media (max-width: 1420px) {
        .features {
            &__content {
                width: 300px;
            }
        }
    }
    @media (max-width: 1345px) {
        .features {
            &__content {
                width: 280px;
            }
        }
    }
    @media (max-width: 1270px) {
        .features {
            &__wrapper {
                flex-wrap: wrap;
            }
            &__wrapper > div {
                &:nth-child(3) , &:nth-child(4) {
                    margin-top: 40px;
                }
            }
            &__content {
                width: 45%;
            }
        }
    }
    @media (max-width: 768px) {
        .features {
            padding: 0 15px;
        }
    }
    @media (max-width: 600px) {
        .features {
            &__content {
                width: 48%;
            }
        }
    }
    @media (max-width: 540px) {
        .features {
            &__content {
                width: 100%;
                & + .features__content {
                    margin-top: 40px;
                }
            }
        }
    }
</style>
