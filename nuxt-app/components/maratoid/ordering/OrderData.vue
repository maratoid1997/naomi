<template>
    <div class="orderData">
        <div class="orderData__info">
            <div class="orderData__content">
                <div class="orderData__info-imgWrapper">
                    <img class="orderData__info-img" src="/icons/sliderProduct/icon_01.png" alt="icon">
                </div>
                <div class="orderData__info-descr">Xüsusi materialdan hazırlanmış məhsul</div>
                <div class="orderData__info-price">
                    <span>52.00</span>
                    <img src="/icons/header/currency_azn.svg" alt="currency_icon">
                </div>
            </div>
            <div class="orderData__content">
                <div class="orderData__info-imgWrapper">
                    <img class="orderData__info-img" src="/icons/sliderProduct/icon_01.png" alt="icon">
                </div>
                <div class="orderData__info-descr">Xüsusi materialdan hazırlanmış məhsul</div>
                <div class="orderData__info-price">
                    <span>52.00</span>
                    <img src="/icons/header/currency_azn.svg" alt="currency_icon">
                </div>
            </div>
        </div>
        <div class="orderData__priceInfoWrapper">
            <div class="orderData__priceInfo">
                <div class="orderData__priceInfo-item">
                    <div class="orderData__priceInfo-key">Sub-Total</div>
                    <div class="orderData__priceInfo-value">
                        <span>52.00</span>
                        <img src="/icons/header/currency_azn.svg" alt="currency_icon">
                    </div>
                </div>
                <div class="orderData__priceInfo-item">
                    <div class="orderData__priceInfo-key">Eco Tax (-2.00)</div>
                    <div class="orderData__priceInfo-value">
                        <span>2.00</span>
                        <img src="/icons/header/currency_azn.svg" alt="currency_icon">
                    </div>
                </div>
                <div class="orderData__priceInfo-item">
                    <div class="orderData__priceInfo-key">VAT (20%)</div>
                    <div class="orderData__priceInfo-value">
                        <span>10.00</span>
                        <img src="/icons/header/currency_azn.svg" alt="currency_icon">
                    </div>
                </div>
            </div>

            <div class="orderData__priceInfo">
                <div class="orderData__priceInfo-item">
                    <div class="orderData__priceInfo-key">Kupon</div>
                    <div class="orderData__priceInfo-value">
                        <span>-2.00</span>
                        <img src="/icons/header/currency_azn.svg" alt="currency_icon">
                    </div>
                </div>
                <div class="orderData__priceInfo-item">
                    <div class="orderData__priceInfo-key">Hədiyyə sertifikatı</div>
                    <div class="orderData__priceInfo-value">
                        <span>-2.00</span>
                        <img src="/icons/header/currency_azn.svg" alt="currency_icon">
                    </div>
                </div>
                <div class="orderData__priceInfo-item">
                    <div class="orderData__priceInfo-key">Total</div>
                    <div class="orderData__priceInfo-value">
                        <span>58.00</span>
                        <img src="/icons/header/currency_azn.svg" alt="currency_icon">
                    </div>
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
    .orderData {
        &__info {
            position: relative;
            padding: 41px;
            border: 1px solid #E9EBEF;
            border-radius: 10px;
            margin-bottom: 24px;
            &-imgWrapper {
                padding: 8px;
                width: 100%;
                max-width: 100px;
                height: 100px;
                border: 1px solid #E9EBEF;
                border-radius: 10px;
            }
            &-img {
                width: 100%;
                height: 100%;
                object-fit: contain;
            }
            &-descr {
                width: 100%;
                max-width: 410px;
                margin-left: 40px;
                padding-right: 30px;
            }
            &-price {
                display: flex;
                align-items: center;
                img {
                    margin-left: 8px;
                }
            }
        }
        &__content {
            display: flex;
            align-items: center;
            padding-bottom: 27px;
            border-bottom: 1px solid #E9EBEF;
            & + .orderData__content {
                margin-top: 26px;
            }
            &:last-child {
                padding-bottom: 0;
                border-bottom: unset;
            }
        }
        &__priceInfoWrapper {
            display: flex;
            justify-content: space-between;
        }
        &__priceInfo {
            width: 49%;
            padding: 21px 25px;
            border: 1px solid #E9EBEF;
            border-radius: 10px;
            &-item {
                display: flex;
                justify-content: space-between;
                padding-bottom: 21px;
                border-bottom: 1px solid #E9EBEF;
                & + .orderData__priceInfo-item {
                    margin-top: 21px;
                }
                &:last-child {
                    padding-bottom: 0;
                    border-bottom: unset;
                }
            }
            &-value {
                display: flex;
                align-items: center;
                img {
                    margin-left: 8px;
                }
            }
        }
    }

    @media (max-width: 1440px) {
        .ordering {
            .orderData {
                &__info {
                    &-price {
                        right: 41px;
                    }
                }
            }
        }
    }
    @media (max-width: 1190px) {
        .ordering {
            .orderData {
                &__info {
                    padding: 20px;
                }
                &__priceInfo {
                    padding: 20px;
                }
            }
        }
    }
    @media (max-width: 992px) {
        .ordering {
            .orderData {
                width: 100%;
                    &__info {
                        &-descr {
                            max-width: 650px;
                        }
                    }
                }
            }
        }
    @media (max-width: 620px) {
        .ordering {
            .orderData {
                &__priceInfoWrapper {
                    flex-direction: column;
                }
                &__priceInfo {
                    width: 100%;
                    & + .orderData__priceInfo {
                        margin-top: 30px;
                    }
                }
            }
        }
    }
    @media (max-width: 425px) {
        .ordering {
            .orderData {
                &__info {
                    padding: 10px;
                    &-descr {
                        margin-left: 15px;
                        padding-right: 10px;
                    }
                }
            }
        }
    }
</style>
