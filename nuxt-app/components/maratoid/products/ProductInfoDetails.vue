<template>
    <div class="productInfoDetails">
        <div class="productInfoDetails__top">
            <div class="productInfoDetails__head">
                <div class="productInfoDetails__head-left">
                    <h2 class="productInfoDetails__head-title">Oriflame</h2>
                </div>
                <div class="productInfoDetails__head-right">
<!--                    <div class="productInfoDetails__counter">-->
<!--                        <img src="/icons/minus.svg" alt="minus_icon" @click="counter&#45;&#45;">-->
<!--                        <span>{{ counter }}</span>-->
<!--                        <img src="/icons/plus.svg" alt="plus_icon" @click="counter++">-->
<!--                    </div>-->
                    <button class="productInfoDetails__head-addCard">Səbətə at</button>
                    <svg class="productInfoDetails__head-favorite" width="38" height="38" viewBox="0 0 26 24" fill="none" xmlns="http://www.w3.org/2000/svg" data-v-d8f642a2="">
                        <path d="M13 23.4327C12.6299 23.4327 12.273 23.2986 11.9949 23.0548C10.9445 22.1357 9.9319 21.2721 9.03847 20.5102L9.03391 20.5063C6.41451 18.2725 4.15256 16.3435 2.57874 14.4433C0.819443 12.3189 0 10.3048 0 8.10438C0 5.96654 0.732559 3.99425 2.06259 2.55056C3.40849 1.0898 5.25526 0.285278 7.26331 0.285278C8.76413 0.285278 10.1386 0.76009 11.3484 1.69641C11.959 2.16904 12.5124 2.74747 13 3.42217C13.4878 2.74747 14.041 2.16904 14.6518 1.69641C15.8616 0.76009 17.2361 0.285278 18.7369 0.285278C20.7447 0.285278 22.5917 1.0898 23.9376 2.55056C25.2676 3.99425 26 5.96654 26 8.10438C26 10.3048 25.1808 12.3189 23.4215 14.4431C21.8476 16.3435 19.5859 18.2723 16.9669 20.5059C16.0719 21.2689 15.0576 22.134 14.0049 23.0552C13.727 23.2986 13.3699 23.4327 13 23.4327ZM7.26331 1.80936C5.68571 1.80936 4.23647 2.4394 3.18216 3.58355C2.11218 4.74497 1.52284 6.35044 1.52284 8.10438C1.52284 9.955 2.21017 11.6101 3.75127 13.4708C5.24078 15.2694 7.45631 17.1588 10.0216 19.3464L10.0263 19.3504C10.9231 20.1152 11.9397 20.9823 12.9978 21.9081C14.0622 20.9805 15.0804 20.112 15.979 19.346C18.5441 17.1584 20.7594 15.2694 22.2489 13.4708C23.7898 11.6101 24.4772 9.955 24.4772 8.10438C24.4772 6.35044 23.8878 4.74497 22.8178 3.58355C21.7637 2.4394 20.3143 1.80936 18.7369 1.80936C17.5812 1.80936 16.5202 2.17698 15.5833 2.9019C14.7484 3.54822 14.1668 4.36524 13.8258 4.93692C13.6504 5.2309 13.3418 5.40638 13 5.40638C12.6582 5.40638 12.3496 5.2309 12.1742 4.93692C11.8334 4.36524 11.2518 3.54822 10.4167 2.9019C9.47983 2.17698 8.41878 1.80936 7.26331 1.80936Z" fill="#363B46" data-v-d8f642a2=""></path>
                    </svg>
                </div>
            </div>
            <div class="productInfoDetails__main">
                <div class="productInfoDetails__main-top">
                    <div class="productInfoDetails__price">
                        <div class="productInfoDetails__price-newPrice">
                            <span>50.00</span>
                            <svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.53191 1.51L8.49791 0L7.43491 0.54L7.40391 1.516C3.26391 1.916 0.00390625 6.476 0.00390625 12.044C0.00390625 12.4027 0.0172395 12.757 0.0439062 13.107H1.49391C1.47991 12.851 1.47091 12.593 1.47091 12.332C1.47091 7.282 4.06391 3.132 7.37091 2.693L7.07091 12.178L8.75291 11.368L8.55291 2.694C11.8529 3.148 14.4389 7.288 14.4389 12.331C14.4389 12.592 14.4299 12.85 14.4159 13.106H15.9539C15.9806 12.7567 15.9939 12.4023 15.9939 12.043C15.9999 6.448 12.7019 1.867 8.53191 1.51Z" fill="#363B46"></path>
                            </svg>
                        </div>
                        <div class="productInfoDetails__price-oldPrice">
                            <s><span>60.00</span></s>
                            <svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.53191 1.51L8.49791 0L7.43491 0.54L7.40391 1.516C3.26391 1.916 0.00390625 6.476 0.00390625 12.044C0.00390625 12.4027 0.0172395 12.757 0.0439062 13.107H1.49391C1.47991 12.851 1.47091 12.593 1.47091 12.332C1.47091 7.282 4.06391 3.132 7.37091 2.693L7.07091 12.178L8.75291 11.368L8.55291 2.694C11.8529 3.148 14.4389 7.288 14.4389 12.331C14.4389 12.592 14.4299 12.85 14.4159 13.106H15.9539C15.9806 12.7567 15.9939 12.4023 15.9939 12.043C15.9999 6.448 12.7019 1.867 8.53191 1.51Z" fill="#363B46"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="productInfoDetails__main-other">
                        <img class="productInfoDetails__main-percentIcon" src="/icons/sliderProduct/percent_icon.svg" alt="percent_icon">
                    </div>
                </div>
                <div class="productInfoDetails__main-bottom">
                    <div class="productInfoDetails__main-bottom-left">
                        <ul class="productInfoDetails__list">
                            <li class="productInfoDetails__list-item">
                                Brend: <span>Oriflame</span>
                            </li>
                            <li class="productInfoDetails__list-item">
                                Həcm: <span>1</span>
                            </li>
                            <li class="productInfoDetails__list-item">
                                Ölçü: <span>1</span>
                            </li>
                        </ul>
                    </div>
                    <div class="productInfoDetails__main-bottom-right">
                        <ul class="productInfoDetails__list">
                            <li class="productInfoDetails__list-item">
                                Dəri növü: <span>1</span>
                            </li>
                            <li class="productInfoDetails__list-item">
                                Aktiv komponent: <span>1</span>
                            </li>
                            <li class="productInfoDetails__list-item">
                                Yaş: <span>1</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="productInfoDetails__main-social">
                    <a class="productInfoDetails__main-link fb" href="#0">
                        <img src="/icons/like_fb.svg" alt="icon_like">
                        <span>Like</span>
                    </a>
                    <a class="productInfoDetails__main-link tweet" href="#0">
                        <img src="/icons/twitter.svg" alt="icon_like">
                        <span>Tweet</span>
                    </a>
                    <a class="productInfoDetails__main-link share" href="#0">
                        <img src="/icons/share.svg" alt="icon_like">
                        <span>Paylaş</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="productInfoDetails__bottom">
            <div class="tabsWrapper">
                <ul class="tabs" ref="tabs">
                    <li class="tab" v-for="tab in tabs" @click="changeTabActive">{{ tab }}</li>
                </ul>
            </div>
            <div class="productInfoDetails__descriptionWrapper" ref="descr">
                <div class="productInfoDetails__description" :class="content === 'Təsvir' ? 'active' : null">
                    Stop your co-workers in their tracks with the stunning new 30-inch diagonal HP LP3065 Flat Panel Monitor.
                    This flagship monitor features best-in-class performance and presentation features on a huge wide-aspect screen
                    while letting you work as comfortably as possible - you might even forget you’re at the office.

                    Stop your co-workers in their tracks with the stunning new 30-inch diagonal HP LP3065 Flat Panel Monitor.
                    This flagship monitor features best-in-class performance and presentation features on a huge wide-aspect screen
                    while letting you work as comfortably as possible - you might even forget you’re at the office. Stop your co-workers
                    in their tracks with the stunning new 30-inch diagonal HP LP3065 Flat Panel Monitor. Stop your co-workers in their
                    tracks with the stunning new 30-inch diagonal HP LP3065 Flat Panel Monitor. Stop your co-workers in their tracks
                    with the stunning new 30-inch diagonal HP LP3065 Flat Panel Monitor.
                </div>
                <div class="productInfoDetails__description" :class="content === 'Xüsusiyyət' ? 'active' : null">
                    in-class performance and presentation features on a huge wide-aspect screen
                    while letting you work as comfortably as possible - you might even forget you’re at the office.
                    in-class performance and presentation features on a huge wide-aspect screen
                    while letting you work as comfortably as possible - you might even forget you’re at the office.
                    in-class performance and presentation features on a huge wide-aspect screen
                    while letting you work as comfortably as possible - you might even forget you’re at the office.
                    in-class performance and presentation features on a huge wide-aspect screen
                    while letting you work as comfortably as possible - you might even forget you’re at the office.
            </div>
                <div class="productInfoDetails__description" :class="content === 'Tətbiq rejimi' ? 'active' : null">
                    123456789 123456789 123456789 123456789 123456789 123456789 123456789 123456789 123456789 123456789
                    123456789 123456789 123456789 123456789 123456789 123456789 123456789 123456789 123456789 123456789
                    123456789 123456789 123456789 123456789 123456789 123456789 123456789 123456789 123456789 123456789
                    123456789 123456789 123456789 123456789 123456789 123456789 123456789 123456789 123456789 123456789
                    123456789 123456789 123456789 123456789 123456789 123456789 123456789 123456789 123456789 123456789
                    123456789 123456789 123456789 123456789 123456789 123456789 123456789 123456789 123456789 123456789
                    123456789 123456789 123456789 123456789 123456789 123456789 123456789 123456789 123456789 123456789
            </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            tabs: ['Təsvir', 'Xüsusiyyət', 'Tətbiq rejimi'],
            content: 'Təsvir'
        }
    },
    methods: {
        changeTabActive(e) {
            const tabs = [...this.$refs.tabs.children],
                  target = e.currentTarget;

            tabs.forEach((item) => {
                item.classList.remove('active');
            });
            target.classList.add('active');

            this.content = target.innerText;
        }
    },
    mounted() {
        this.$refs.tabs.firstElementChild.classList.add('active');
    }
}
</script>

<style lang="scss" scoped>
    .productInfoDetails {
        &__top {
            width: 100%;
            height: 370px;
            padding: 27px;
            border: 1px solid #E9EBEF;
            border-radius: 10px;
        }
        &__bottom {
            margin-top: 25px;
            height: 341px;
            padding: 27px 27px 41px 27px;
            border: 1px solid #E9EBEF;
            border-radius: 10px;
            overflow-y: auto;
        }
        &__head {
            display: flex;
            justify-content: space-between;
            padding-bottom: 15px;
            border-bottom: 1px solid #E9EBEF;
            &-title {
                font-weight: normal;
                font-size: 30px;
                line-height: 38px;
                color: #363B46;
                margin-bottom: 0;
            }
            &-addCard {
                margin: 0 25px;
                font-weight: normal;
                line-height: 21px;
                color: #FFFFFF;
                background-color: #6C8685;
                border-radius: 100px;
                padding: 11px 31px;
                border: none;
                outline: none;
            }
            &-favorite {
                cursor: pointer;
                &.active {
                    background-color: #FFACAC;
                }
            }
            &-right {
                display: flex;
                align-items: center;
            }
        }
        &__main {
            padding: 15px 0 20px 0;
            &-top {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }
            &-bottom {
                display: flex;
                padding-bottom: 20px;
                border-bottom: 1px solid #E9EBEF;
                &-left, &-right {
                    width: 50%;
                }
            }
            &-percentIcon {
                width: 42px;
                height: 42px;
            }
            &-social {
                padding: 34px 0;
            }
            &-link {
                padding: 10.5px 49.5px;
                color: #FFFFFF;
                background-color: silver;
                border-radius: 100px;
                text-decoration: none;
                span {
                    margin-left: 9px;
                }
                & + .productInfoDetails__main-link {
                    margin-left: 25px;
                }
                &.fb {
                    background-color: #1A77F2;
                }
                &.tweet {
                    background-color: #1D95E0;
                }
                &.share {
                    background-color: #F57272;
                }
            }
        }
        &__price {
            display: flex;
            font-weight: 500;
            font-size: 35px;
            line-height: 41px;
            color: #363B46;
            &-oldPrice, &-newPrice {
                display: flex;
                align-items: center;
            }
            &-newPrice {
                margin-right: 48px;
            }
            &-oldPrice {
                color: rgba(108, 134, 133, 0.7);
                svg {
                    path {
                        fill: rgba(108, 134, 133, 0.7);
                    }
                }
            }
            svg {
                width: 30px;
                height: 25px;
                margin-left: 12px;
            }
        }
        &__list {
            list-style: none;
            margin: 9px 0 0 0;
            &-item {
                font-weight: normal;
                font-size: 20px;
                line-height: 26px;
                color: #363B46;
                & + .productInfoDetails__list-item {
                    margin-top: 13px;
                }
            }
        }
        &__descriptionWrapper {
            margin-top: 25px;
        }
        &__description {
            display: none;
            font-weight: 300;
            font-size: 18px;
            line-height: 23px;
            color: #363B46;
            &.active {
                display: block;
            }
        }
        &__counter {
            display: flex;
            align-items: center;
            padding: 9px 19px;
            border: 1px solid #E9EBEF;
            border-radius: 100px;
            span {
                margin: 0 17px;
                font-weight: normal;
                font-size: 18px;
                line-height: 23px;
                color: #363B46;
            }
            img {
                cursor: pointer;
            }
        }
    }
</style>
