<template>
    <div class="product" ref="product">
        <div class="product__content discount">
            <div class="product__content-head">
                <img class="product__content-head-img" src="/icons/sliderProduct/icon_01.png" alt="icon">
                <img class="product__content-head-icon" src="/icons/sliderProduct/percent_icon.svg" alt="percent_icon">
            </div>
            <div class="product__content-footer">
                <div class="product__content-name">{{ product.name }}</div>
                <div class="product__content-price">
                    <div class="product__content-oldPrice">
                        <span>60.00</span>
                        <svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.53191 1.51L8.49791 0L7.43491 0.54L7.40391 1.516C3.26391 1.916 0.00390625 6.476 0.00390625 12.044C0.00390625 12.4027 0.0172395 12.757 0.0439062 13.107H1.49391C1.47991 12.851 1.47091 12.593 1.47091 12.332C1.47091 7.282 4.06391 3.132 7.37091 2.693L7.07091 12.178L8.75291 11.368L8.55291 2.694C11.8529 3.148 14.4389 7.288 14.4389 12.331C14.4389 12.592 14.4299 12.85 14.4159 13.106H15.9539C15.9806 12.7567 15.9939 12.4023 15.9939 12.043C15.9999 6.448 12.7019 1.867 8.53191 1.51Z" fill="#363B46"/>
                        </svg>
                    </div>
                    <div class="product__content-newPrice">
                        <span>50.00</span>
                        <svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.53191 1.51L8.49791 0L7.43491 0.54L7.40391 1.516C3.26391 1.916 0.00390625 6.476 0.00390625 12.044C0.00390625 12.4027 0.0172395 12.757 0.0439062 13.107H1.49391C1.47991 12.851 1.47091 12.593 1.47091 12.332C1.47091 7.282 4.06391 3.132 7.37091 2.693L7.07091 12.178L8.75291 11.368L8.55291 2.694C11.8529 3.148 14.4389 7.288 14.4389 12.331C14.4389 12.592 14.4299 12.85 14.4159 13.106H15.9539C15.9806 12.7567 15.9939 12.4023 15.9939 12.043C15.9999 6.448 12.7019 1.867 8.53191 1.51Z" fill="#363B46"/>
                        </svg>
                    </div>
                </div>
                <div class="product__content-buy">
                    <button class="product__content-btn" @click="onChange(true)">Səbətə at</button>
                    <svg width="26" height="24" viewBox="0 0 26 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13 23.4327C12.6299 23.4327 12.273 23.2986 11.9949 23.0548C10.9445 22.1357 9.9319 21.2721 9.03847 20.5102L9.03391 20.5063C6.41451 18.2725 4.15256 16.3435 2.57874 14.4433C0.819443 12.3189 0 10.3048 0 8.10438C0 5.96654 0.732559 3.99425 2.06259 2.55056C3.40849 1.0898 5.25526 0.285278 7.26331 0.285278C8.76413 0.285278 10.1386 0.76009 11.3484 1.69641C11.959 2.16904 12.5124 2.74747 13 3.42217C13.4878 2.74747 14.041 2.16904 14.6518 1.69641C15.8616 0.76009 17.2361 0.285278 18.7369 0.285278C20.7447 0.285278 22.5917 1.0898 23.9376 2.55056C25.2676 3.99425 26 5.96654 26 8.10438C26 10.3048 25.1808 12.3189 23.4215 14.4431C21.8476 16.3435 19.5859 18.2723 16.9669 20.5059C16.0719 21.2689 15.0576 22.134 14.0049 23.0552C13.727 23.2986 13.3699 23.4327 13 23.4327ZM7.26331 1.80936C5.68571 1.80936 4.23647 2.4394 3.18216 3.58355C2.11218 4.74497 1.52284 6.35044 1.52284 8.10438C1.52284 9.955 2.21017 11.6101 3.75127 13.4708C5.24078 15.2694 7.45631 17.1588 10.0216 19.3464L10.0263 19.3504C10.9231 20.1152 11.9397 20.9823 12.9978 21.9081C14.0622 20.9805 15.0804 20.112 15.979 19.346C18.5441 17.1584 20.7594 15.2694 22.2489 13.4708C23.7898 11.6101 24.4772 9.955 24.4772 8.10438C24.4772 6.35044 23.8878 4.74497 22.8178 3.58355C21.7637 2.4394 20.3143 1.80936 18.7369 1.80936C17.5812 1.80936 16.5202 2.17698 15.5833 2.9019C14.7484 3.54822 14.1668 4.36524 13.8258 4.93692C13.6504 5.2309 13.3418 5.40638 13 5.40638C12.6582 5.40638 12.3496 5.2309 12.1742 4.93692C11.8334 4.36524 11.2518 3.54822 10.4167 2.9019C9.47983 2.17698 8.41878 1.80936 7.26331 1.80936Z" fill="#363B46"/>
                    </svg>
                </div>
            </div>
        </div>
<!--        <custom-modals v-model="modalActive" :class="{'active' : modalActive === true}"/>-->
<!--        <index-prod :modalActive="modalActive" :class="{'active' : modalActive === true}"/>-->
    </div>
</template>

<script>
// import CustomModals from "../modals/CustomModals";
import IndexProd from '../../../pages/products/index'

export default {
    components: {
        // CustomModals,
        IndexProd
    },
    data() {
        return {

        }
    },
    methods: {
        onChange() {
            this.$nuxt.$emit('open-modal', this.product);
        }
    },
    props: ['value', 'product']
}
</script>

<style lang="scss" scoped>
    .product {
        position: relative;
        width: 318px;
        //margin-bottom: 25px;
        //margin-left: 24px;
        &__head {
            display: flex;
            justify-content: space-between;
        }
        &__title {
            font-weight: 300;
            font-size: 25px;
            line-height: 32px;
            color: #363B46;
            margin-bottom: 28px;
            span {
                font-weight: 600;
            }
        }
        &__link {
            margin-bottom: 27px;
            padding: 8.2px 27.5px;
            border: 1px solid rgba(108, 134, 133, 0.7);
            border-radius: 100px;
            text-decoration: none;
            span {
                margin-right: 9px;
                line-height: 21px;
                color: #6C8685;
            }
        }
        &__content {
            border: 1px solid #E9EBEF;
            border-radius: 10px;
            &.discount {
                .product__content-btn {
                    background-color: #FFACAC;
                }
            }
            &-head {
                position: relative;
                text-align: center;
                padding: 20px;
                border-radius: 10px;
                border-bottom: 1px solid #E9EBEF;
                &-img {
                    width: 100%;
                    height: 250px;
                    object-fit: contain;
                }
                &-icon {
                    position: absolute;
                    top: 20px;
                    left: 20px;
                    width: 45px;
                    height: 45px;
                }
            }
            &-footer {
                padding: 15px 20px 21px 20px;
            }
            &-name {
                font-weight: normal;
                font-size: 20px;
                line-height: 26px;
                color: #363B46;
            }
            &-price {
                display: flex;
                margin-top: 7px;
                font-weight: 500;
                font-size: 26px;
                line-height: 30px;
                color: #363B46;
            }
            &-oldPrice {
                position: relative;
                margin-right: 30px;
                &:before {
                    content: "";
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    width: 100%;
                    height: 1px;
                    background-color: #6C8685;
                    transform: translate(-50%,-50%) rotate(11deg);
                }
                span {
                    font-family: 'Roboto';
                    font-weight: 500;
                    font-style: italic;
                    color: #6C8685;
                }
                svg {
                    path {
                        fill: #6C8685;
                    }
                }
            }
            &-newPrice {
                span {
                    font-family: 'Roboto';
                    font-weight: 500;
                }
            }
            &-buy {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-top: 14px;
                svg {
                    cursor: pointer;
                }
            }
            &-btn {
                padding: 10.5px 31.1px;
                font-weight: normal;
                line-height: 21px;
                color: #FFFFFF;
                background-color: #6C8685;
                border-radius: 100px;
                outline: none;
                border: none;
            }
        }
    }
</style>
