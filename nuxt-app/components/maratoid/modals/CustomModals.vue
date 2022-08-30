<template>
    <div class="blackout" :class="{'active': this.is_active}">
        <div class="customModal" :class="{'active': this.is_active}" id="customModal">
            <div class="customModal__head">
                <h2 class="customModal__title">Mal səbətə əlavə olunub</h2>
                <img
                    class="customModal__close"
                    src="/icons/close_icon.svg"
                    alt="close_icon"
                    @click="is_active = false"
                >
            </div>
            <div class="customModal__subhead">
                <div class="customModal__subhead-left">
                    <a href="#0" class="basketWrapper">
                        <img src="/icons/header/basket_icon.svg" alt="basket_icon" class="basket">
                        <span>0</span>
                    </a>
                    <div class="basketInfoWrapper">
                        <div class="basketInfoWrapper__text">Səbətim</div>
                        <div class="basketInfoWrapper__sum">
                            <span>0.00</span>
                            <img src="/icons/header/currency_azn.svg" alt="basket_icon" class="basketInfoWrapper__img">
                        </div>
                    </div>
                </div>
                <div class="customModal__subhead-right">
                    <continue-shopping/>
                </div>
            </div>
            <div class="customModal__main">
                <div class="customModal__main-left">
                    <div class="customModal__main-imgWrapper">
                        <img class="customModal__main-img" src="/icons/sliderProduct/icon_01.png" alt="img">
                    </div>
                    <div class="customModal__main-productDescription">
                        <h2 class="customModal__main-productName">{{ info.name }}</h2>
                        <div class="customModal__main-productStock">Stokda var</div>
                        <div class="customModal__main-sum">
                            <div class="customModal__main-price">
                                <span>50.00</span>
                                <img src="/icons/header/currency_azn.svg" alt="currency_icon">
                            </div>
                            <div class="customModal__main-bonus">
                                <span>+ BonusPlus 21.99</span>
                                <svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.53191 1.51L8.49791 0L7.43491 0.54L7.40391 1.516C3.26391 1.916 0.00390625 6.476 0.00390625 12.044C0.00390625 12.4027 0.0172395 12.757 0.0439062 13.107H1.49391C1.47991 12.851 1.47091 12.593 1.47091 12.332C1.47091 7.282 4.06391 3.132 7.37091 2.693L7.07091 12.178L8.75291 11.368L8.55291 2.694C11.8529 3.148 14.4389 7.288 14.4389 12.331C14.4389 12.592 14.4299 12.85 14.4159 13.106H15.9539C15.9806 12.7567 15.9939 12.4023 15.9939 12.043C15.9999 6.448 12.7019 1.867 8.53191 1.51Z" fill="#363B46"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <button>Sifarişi rəsmiləşdir</button>
                </div>
                <div class="customModal__main-right">
                    <order-without-registration/>
                </div>
            </div>
            <div class="customModal__footer">
                <a class="customModal__linkQuestionnaire" href="#0">
                    <span>Dəri tipinə görə anketə keçid edin</span>
                    <svg width="15" height="11" viewBox="0 0 15 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.89998 0.267939C4.94851 0.215797 5.00701 0.173932 5.07202 0.144827C5.13704 0.115721 5.20723 0.0999682 5.27845 0.0985015C5.34967 0.0970348 5.42045 0.109884 5.48661 0.136288C5.55276 0.162692 5.61294 0.202113 5.66358 0.252212C5.71421 0.302312 5.75427 0.362069 5.78138 0.427941C5.80849 0.493812 5.82209 0.564457 5.82138 0.635684C5.82067 0.706912 5.80566 0.777271 5.77725 0.84259C5.74884 0.907909 5.7076 0.966857 5.65598 1.01594L1.82298 4.84894H14.471C14.5406 4.84867 14.6096 4.86221 14.674 4.88876C14.7383 4.91532 14.7968 4.95436 14.846 5.00364C14.8952 5.05292 14.9341 5.11146 14.9605 5.17588C14.987 5.2403 15.0004 5.30931 15 5.37894C15.0006 5.44897 14.9875 5.51844 14.9612 5.58337C14.935 5.6483 14.8961 5.7074 14.847 5.75729C14.7978 5.80719 14.7393 5.84688 14.6748 5.87411C14.6103 5.90133 14.541 5.91555 14.471 5.91594H1.82198L5.65498 9.74194C5.75321 9.84325 5.80815 9.97882 5.80815 10.1199C5.80815 10.2611 5.75321 10.3966 5.65498 10.4979C5.60565 10.5481 5.54682 10.588 5.48192 10.6152C5.41702 10.6424 5.34735 10.6564 5.27698 10.6564C5.2066 10.6564 5.13693 10.6424 5.07203 10.6152C5.00713 10.588 4.94831 10.5481 4.89898 10.4979L0.157976 5.75694C0.107898 5.70837 0.0680838 5.65024 0.0408945 5.586C0.0137053 5.52175 -0.000305176 5.4527 -0.000305176 5.38294C-0.000305176 5.31318 0.0137053 5.24413 0.0408945 5.17988C0.0680838 5.11564 0.107898 5.05751 0.157976 5.00894L4.89998 0.267939Z" fill="#6C8685"/>
                    </svg>
                </a>
            </div>
        </div>
        <div class="customModal customModalQuestionnaire">
            <form>
                <div class="customModal__head">
                    <h2 class="customModal__title">Анкет</h2>
                    <img class="customModal__close" src="/icons/close_icon.svg" alt="close_icon">
                </div>
                <div class="customModalQuestionnaire__main">
                    <div class="customModalQuestionnaire__wrapper">
                        <h2 class="customModalQuestionnaire__title">Возраст</h2>
                        <div class="customModalQuestionnaire__content">
                            <div class="customModalQuestionnaire__inner">
                                <input type="radio" id="age" name="age">
                                <label for="age">18-25</label>
                            </div>
                            <div class="customModalQuestionnaire__inner">
                                <input type="radio" id="age2" name="age">
                                <label for="age2">25-33</label>
                            </div>
                            <div class="customModalQuestionnaire__inner">
                                <input type="radio" id="age3" name="age">
                                <label for="age3">33-45</label>
                            </div>
                            <div class="customModalQuestionnaire__inner">
                                <input type="radio" id="age4" name="age">
                                <label for="age4">45-60</label>
                            </div>
                        </div>
                    </div>
                    <div class="customModalQuestionnaire__wrapper">
                        <h2 class="customModalQuestionnaire__title">Тип кожи</h2>
                        <div class="customModalQuestionnaire__content">
                            <div class="customModalQuestionnaire__inner">
                                <input type="radio" id="skinType" name="skinType">
                                <label for="skinType">Сухая</label>
                            </div>
                            <div class="customModalQuestionnaire__inner">
                                <input type="radio" id="skinType2" name="skinType">
                                <label for="skinType2">Жирная</label>
                            </div>
                            <div class="customModalQuestionnaire__inner">
                                <input type="radio" id="skinType3" name="skinType">
                                <label for="skinType3">Комбинированная</label>
                            </div>
                        </div>
                    </div>
                    <div class="customModalQuestionnaire__wrapper">
                        <h2 class="customModalQuestionnaire__title">Лицо</h2>
                        <div class="customModalQuestionnaire__content block">
                            <div class="customModalQuestionnaire__inner">
                                <input type="radio" id="face" name="face">
                                <label for="face">Черные точки, широкие поры</label>
                                <input type="radio" id="face2" name="face">
                                <label for="face2">Черные точки, широкие поры</label>
                                <input type="radio" id="face3" name="face">
                                <label for="face3">Ранние возрастные изменения</label>
                            </div>
                            <div class="customModalQuestionnaire__inner">
                                <input type="radio" id="face4" name="face2">
                                <label for="face4">Шелушащаяся кожа</label>
                                <input type="radio" id="face5" name="face2">
                                <label for="face5">Пигментация</label>
                            </div>
                            <div class="customModalQuestionnaire__inner">
                                <input type="radio" id="face7" name="face3">
                                <label for="face7">Угри</label>
                                <input type="radio" id="face8" name="face3">
                                <label for="face8">Покраснения и аллергические реакции</label>
                            </div>
                        </div>
                    </div>
                    <div class="customModalQuestionnaire__wrapper">
                        <h2 class="customModalQuestionnaire__title">Тело</h2>
                        <div class="customModalQuestionnaire__content">
                            <div class="customModalQuestionnaire__inner">
                                <input type="radio" id="face9" name="face4">
                                <label for="face9">Черные точки, широкие поры</label>
                            </div>
                            <div class="customModalQuestionnaire__inner">
                                <input type="radio" id="face10" name="face4">
                                <label for="face10">Шелушащаяся кожа</label>
                            </div>
                            <div class="customModalQuestionnaire__inner">
                                <input type="radio" id="face11" name="face4">
                                <label for="face11">Угри</label>
                            </div>
                        </div>
                    </div>
                    <div class="customModalQuestionnaire__wrapper">
                        <h2 class="customModalQuestionnaire__title">Волосы</h2>
                        <div class="customModalQuestionnaire__content block">
                            <div class="customModalQuestionnaire__inner">
                                <input type="radio" id="face12" name="face">
                                <label for="face12">Черные точки, широкие поры</label>
                                <input type="radio" id="face13" name="face">
                                <label for="face13">Черные точки, широкие поры</label>
                                <input type="radio" id="face14" name="face">
                                <label for="face14">Ранние возрастные изменения</label>
                            </div>
                            <div class="customModalQuestionnaire__inner">
                                <input type="radio" id="face15" name="face2">
                                <label for="face15">Шелушащаяся кожа</label>
                                <input type="radio" id="face16" name="face2">
                                <label for="face16">Пигментация</label>
                            </div>
                            <div class="customModalQuestionnaire__inner">
                                <input type="radio" id="face17" name="face3">
                                <label for="face17">Угри</label>
                                <input type="radio" id="face18" name="face3">
                                <label for="face18">Покраснения и аллергические реакции</label>
                            </div>
                        </div>
                    </div>
                    <div class="customModalQuestionnaire__wrapper">
                        <h2 class="customModalQuestionnaire__title">Какой уход вы предпочитаете? </h2>
                        <div class="customModalQuestionnaire__content">
                            <div class="customModalQuestionnaire__inner">
                                <input type="radio" id="face19" name="face4">
                                <label for="face19">Черные точки, широкие поры</label>
                            </div>
                            <div class="customModalQuestionnaire__inner">
                                <input type="radio" id="face20" name="face4">
                                <label for="face20">Шелушащаяся кожа</label>
                            </div>
                            <div class="customModalQuestionnaire__inner">
                                <input type="radio" id="face21" name="face4">
                                <label for="face21">Угри</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="btnWrapper">
                    <button>Təsdiqlə</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import ContinueShopping from "../ContinueShopping";
import OrderWithoutRegistration from "../OrderWithoutRegistration";

export default {
    components: {
        OrderWithoutRegistration,
        ContinueShopping,
    },
    created() {
        this.$nuxt.$on('open-modal', (e) => {
            this.is_active = true
            this.info = e
        })
        this.$nuxt.$on('close-modal', (e) => {
            this.is_active = false
            this.info = e
        })
    },
    beforeDestroy(){
        this.$nuxt.$off('open-modal')
        this.$nuxt.$off('close-modal')
    },
    methods: {
        onChange(newValue) {
            this.$emit('input', newValue);
        }
    },
    props: ['modalActive'],
    data() {
        return {
            is_active: false,
            info: {}
        }
    }
}
</script>

<style lang="scss" scoped>

</style>
