<template>
    <header class="allHeader">
        <div class="header">
            <div class="header__left">
                <div class="dropdown" @click="activeLang = !activeLang" :class="{'active' : activeLang}">
                    <span class="selected">AZ</span>
                    <img class="dropdown__arrowIcon" src="/icons/header/arrow_down.svg" alt="arrow_down">
                    <div class="optionsContainer">
                        <a class="option" href="#0">EN</a>
                        <a class="option" href="#0">RU</a>
                    </div>
                </div>
                <div class="dropdown dropdown_currencyUnit" @click="activeCurrency = !activeCurrency" :class="{'active' : activeCurrency}">
                    <img class="dropdown__currencyIcon" src="/icons/header/currency_azn.svg" alt="currency_icon">
                    <span class="selected">Pul vahidi</span>
                    <img class="dropdown__arrowIcon" src="/icons/header/arrow_down.svg" alt="arrow_down">
                    <div class="optionsContainer">
                        <a class="option" href="#0">
                            <img src="/icons/header/currency_usd.svg" alt="currency_icon">
                        </a>
                        <a class="option" href="#0">
                            <img src="/icons/header/currency_eur.svg" alt="currency_icon">
                        </a>
                    </div>
                </div>
            </div>
            <div class="header__right">
                <nav class="nav">
                    <ul class="nav__list">
                        <li class="nav__list-item">
                            <a class="nav__list-link" href="#0">Loyallıq proqramı</a>
                        </li>
                        <li class="nav__list-item">
                            <a class="nav__list-link" href="#0">Bloq</a>
                        </li>
                        <li class="nav__list-item">
                            <a class="nav__list-link" href="#0">Haqqımızda</a>
                        </li>
                        <li class="nav__list-item">
                            <a class="nav__list-link" href="#0">Məhsullar</a>
                        </li>
                        <li class="nav__list-item">
                            <div class="dropdown dropdown_headerNav" @click="activeHeaderNav = !activeHeaderNav" :class="{'active' : activeHeaderNav}">
                                <span class="selected">Brendlər</span>
                                <img class="dropdown__arrowIcon" src="/icons/header/arrow_down.svg" alt="arrow_down" >
                                <div class="optionsContainer">
                                    <a class="option" href="#0">Şəxsi Kabinet</a>
                                    <a class="option" href="#0">Ödəniş tarixçəsi</a>
                                    <a class="option" href="#0">Çıxış</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav__list-item">
                            <a class="nav__list-link" href="#0">Əlaqə</a>
                        </li>
                    </ul>
                </nav>
                <div class="searchInputWrapper">
                    <input class="searchInput" type="text" placeholder="Axtar">
                    <button class="searchInputIconWrapper">
                        <img class="searchInputIcon" src="/icons/header/search_icon.svg" alt="search_icon">
                    </button>
                </div>
                <div class="dropdown dropdown_user" @click="activeUser = !activeUser" :class="{'active' : activeUser}">
                    <img class="dropdown__userIcon" src="/icons/header/user_icon.svg" alt="user_icon">
                    <img class="dropdown__arrowIcon" src="/icons/header/arrow_down.svg" alt="arrow_down">
                    <div class="optionsContainer">
                        <a class="option" href="#0">Şəxsi Kabinet</a>
                        <a class="option" href="#0">Ödəniş tarixçəsi</a>
                        <a class="option" href="#0">Çıxış</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="subHeader">
            <div class="subHeader__left">
                <div class="subHeader__logoWrapper">
                    <a href="#0">
                        <img class="subHeader__logo" src="/icons/header/logo.svg" alt="logo_icon" >
                    </a>
                </div>
            </div>
            <div class="subHeader__right">
                <nav class="nav">
                    <ul class="nav__list">
                        <li class="nav__list-item">
                            <a class="nav__list-link new" href="#0">New</a>
                        </li>
                        <li class="nav__list-item">
                            <div class="dropdown dropdown_headerNav">
                                <span class="selected">Body care</span>
                                <img class="dropdown__arrowIcon" src="/icons/header/arrow_down.svg" alt="arrow_down" >
                                <div class="optionsContainer">
                                    <a class="option" href="#0">Şəxsi Kabinet</a>
                                    <a class="option" href="#0">Ödəniş tarixçəsi</a>
                                    <a class="option" href="#0">Çıxış</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav__list-item">
                            <div class="dropdown dropdown_headerNav">
                                <span class="selected">Decorative cosmetics</span>
                                <img class="dropdown__arrowIcon" src="/icons/header/arrow_down.svg" alt="arrow_down" >
                                <div class="optionsContainer">
                                    <a class="option" href="#0">Şəxsi Kabinet</a>
                                    <a class="option" href="#0">Ödəniş tarixçəsi</a>
                                    <a class="option" href="#0">Çıxış</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav__list-item">
                            <div class="dropdown dropdown_headerNav">
                                <span class="selected">Hair care</span>
                                <img class="dropdown__arrowIcon" src="/icons/header/arrow_down.svg" alt="arrow_down" >
                                <div class="optionsContainer">
                                    <a class="option" href="#0">Şəxsi Kabinet</a>
                                    <a class="option" href="#0">Ödəniş tarixçəsi</a>
                                    <a class="option" href="#0">Çıxış</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav__list-item">
                            <div class="dropdown dropdown_headerNav">
                                <span class="selected">Vitamins</span>
                                <img class="dropdown__arrowIcon" src="/icons/header/arrow_down.svg" alt="arrow_down" >
                                <div class="optionsContainer">
                                    <a class="option" href="#0">Şəxsi Kabinet</a>
                                    <a class="option" href="#0">Ödəniş tarixçəsi</a>
                                    <a class="option" href="#0">Çıxış</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav__list-item">
                            <div class="dropdown dropdown_headerNav">
                                <span class="selected">Accessories</span>
                                <img class="dropdown__arrowIcon" src="/icons/header/arrow_down.svg" alt="arrow_down" >
                                <div class="optionsContainer">
                                    <a class="option" href="#0">Şəxsi Kabinet</a>
                                    <a class="option" href="#0">Ödəniş tarixçəsi</a>
                                    <a class="option" href="#0">Çıxış</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav__list-item">
                            <div class="dropdown dropdown_headerNav">
                                <span class="selected">Massagers</span>
                                <img class="dropdown__arrowIcon" src="/icons/header/arrow_down.svg" alt="arrow_down" >
                                <div class="optionsContainer">
                                    <a class="option" href="#0">Şəxsi Kabinet</a>
                                    <a class="option" href="#0">Ödəniş tarixçəsi</a>
                                    <a class="option" href="#0">Çıxış</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav__list-item">
                            <a class="nav__list-link" href="#0">Gift sets</a>
                        </li>
                    </ul>
                </nav>
                <a class="likesWrapper" href="#0">
                    <img class="likes" src="/icons/header/like_icon.svg" alt="likes_icon">
                    <span>0</span>
                </a>
                <a class="basketWrapper" href="#0">
                    <img class="basket" src="/icons/header/basket_icon.svg" alt="basket_icon">
                    <span>0</span>
                </a>
                <div class="basketInfoWrapper">
                    <div class="basketInfoWrapper__text">Səbətim</div>
                    <div class="basketInfoWrapper__sum">
                        <span>0.00</span>
                        <img class="basketInfoWrapper__img" src="/icons/header/currency_azn.svg" alt="basket_icon">
                    </div>
                </div>
            </div>
        </div>
        <div class="headerMini">
            <div class="headerMini__left">
                <div class="hamburger" @click="hamburgerMenuActive = !hamburgerMenuActive">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="hamburgerMenu" :class="{'active' : hamburgerMenuActive}">
                    <div class="hamburgerMenu__close">
                        <img src="/icons/hamburger/close_icon.svg" alt="close_icon" @click="hamburgerMenuActive = !hamburgerMenuActive">
                    </div>
                    <div class="searchInputWrapper">
                        <input type="text" placeholder="Axtar" class="searchInput">
                        <button class="searchInputIconWrapper">
                            <img src="/icons/header/search_icon.svg" alt="search_icon" class="searchInputIcon">
                        </button>
                    </div>
                    <div class="hamburgerMenu__details">
                        <div class="hamburgerMenu__langWrapper">
                            <a class="hamburgerMenu__lang active" href="#0">AZ</a>
                            <a class="hamburgerMenu__lang" href="#0">EN</a>
                            <a class="hamburgerMenu__lang" href="#0">RU</a>
                        </div>
                        <div class="hamburgerMenu__currencyWrapper">
                            <a class="hamburgerMenu__currency" href="#0">
                                <img src="/icons/header/currency_azn.svg" alt="currency_icon">
                            </a>
                            <a class="hamburgerMenu__currency" href="#0">
                                <img src="/icons/header/currency_usd.svg" alt="currency_icon">
                            </a>
                            <a class="hamburgerMenu__currency" href="#0">
                                <img src="/icons/header/currency_eur.svg" alt="currency_icon">
                            </a>
                        </div>
                    </div>
                    <div class="hamburgerMenu__listWrapper">
                        <div class="hamburgerMenu__firstList">
                            <ul class="hamburgerMenu__list">
                                <li class="hamburgerMenu__list-item">
                                    <a class="hamburgerMenu__list-link" href="#0">Loyallıq proqramı</a>
                                </li>
                                <li class="hamburgerMenu__list-item" @click="addTitle('Bloq')" :class="{'active' : listItemActive && title === 'Bloq'}">
                                    <span>Bloq</span>
                                    <img class="hamburgerMenu__list-item-icon" src="/icons/header/arrow_down.svg" alt="arrow_icon">
                                    <ul class="hamburgerMenu__list-children">
                                        <li class="hamburgerMenu__list-itemHead">
                                            <img class="hamburgerMenu__list-back"
                                                 src="/icons/header/arrow_down.svg" alt="arrow_icon"
                                                 @click.stop="listItemActive = !listItemActive"
                                            >
                                            <img class="hamburgerMenu__list-close"
                                                 src="/icons/hamburger/close_icon.svg" alt="close_icon"
                                                 @click="hamburgerMenuActive = !hamburgerMenuActive"
                                            >
                                        </li>
                                        <li class="hamburgerMenu__list-itemTitle">{{ title }}</li>
                                        <li class="hamburgerMenu__list-item">
                                            <a class="hamburgerMenu__list-link" href="#0">Bronzers1</a>
                                        </li>
                                        <li class="hamburgerMenu__list-item">
                                            <a class="hamburgerMenu__list-link" href="#0">Deodorants2</a>
                                        </li>
                                        <li class="hamburgerMenu__list-item">
                                            <a class="hamburgerMenu__list-link" href="#0">Tanning oils3</a>
                                        </li>
                                        <li class="hamburgerMenu__list-item">
                                            <a class="hamburgerMenu__list-link" href="#0">Shower gels4</a>
                                        </li>
                                        <li class="hamburgerMenu__list-item">
                                            <a class="hamburgerMenu__list-link" href="#0">Creams5</a>
                                        </li>
                                        <li class="hamburgerMenu__list-item">
                                            <a class="hamburgerMenu__list-link" href="#0">Soap6</a>
                                        </li>
                                        <li class="hamburgerMenu__list-item">
                                            <a class="hamburgerMenu__list-link" href="#0">Scrubs7</a>
                                        </li>
                                        <li class="hamburgerMenu__list-item">
                                            <a class="hamburgerMenu__list-link" href="#0">Oils8</a>
                                        </li>
                                        <li class="hamburgerMenu__list-item">
                                            <a class="hamburgerMenu__list-link" href="#0">Oils9</a>
                                        </li>
                                        <li class="hamburgerMenu__list-item">
                                            <a class="hamburgerMenu__list-link" href="#0">Oils10</a>
                                        </li>
                                        <li class="hamburgerMenu__list-item">
                                            <a class="hamburgerMenu__list-link" href="#0">Oils11</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="hamburgerMenu__list-item">
                                    <a class="hamburgerMenu__list-link" href="#0">Haqqımızda</a>
                                </li>
                                <li class="hamburgerMenu__list-item">
                                    <a class="hamburgerMenu__list-link" href="#0">Məhsullar</a>
                                </li>
                                <li class="hamburgerMenu__list-item" @click="addTitle('Brendlər')" :class="{'active' : listItemActive && title === 'Brendlər'}">
                                    <span>Brendlər</span>
                                    <img class="hamburgerMenu__list-item-icon" src="/icons/header/arrow_down.svg" alt="arrow_icon">
                                    <ul class="hamburgerMenu__list-children">
                                        <li class="hamburgerMenu__list-itemHead">
                                            <img class="hamburgerMenu__list-back"
                                                 src="/icons/header/arrow_down.svg" alt="arrow_icon"
                                                 @click.stop="listItemActive = !listItemActive"
                                            >
                                            <img class="hamburgerMenu__list-close"
                                                 src="/icons/hamburger/close_icon.svg" alt="close_icon"
                                                 @click="hamburgerMenuActive = !hamburgerMenuActive"
                                            >
                                        </li>
                                        <li class="hamburgerMenu__list-itemTitle">{{ title }}</li>
                                        <li class="hamburgerMenu__list-item">
                                            <a class="hamburgerMenu__list-link" href="#0">Bronzers</a>
                                        </li>
                                        <li class="hamburgerMenu__list-item">
                                            <a class="hamburgerMenu__list-link" href="#0">Deodorants</a>
                                        </li>
                                        <li class="hamburgerMenu__list-item">
                                            <a class="hamburgerMenu__list-link" href="#0">Tanning oils</a>
                                        </li>
                                        <li class="hamburgerMenu__list-item">
                                            <a class="hamburgerMenu__list-link" href="#0">Shower gels</a>
                                        </li>
                                        <li class="hamburgerMenu__list-item">
                                            <a class="hamburgerMenu__list-link" href="#0">Creams</a>
                                        </li>
                                        <li class="hamburgerMenu__list-item">
                                            <a class="hamburgerMenu__list-link" href="#0">Soap</a>
                                        </li>
                                        <li class="hamburgerMenu__list-item">
                                            <a class="hamburgerMenu__list-link" href="#0">Scrubs</a>
                                        </li>
                                        <li class="hamburgerMenu__list-item">
                                            <a class="hamburgerMenu__list-link" href="#0">Oils</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="hamburgerMenu__list-item">
                                    <a class="hamburgerMenu__list-link" href="#0">Əlaqə</a>
                                </li>
                            </ul>
                        </div>
                        <div class="hamburgerMenu__secondList">
                            <ul class="hamburgerMenu__list">
                                <li class="hamburgerMenu__list-item">
                                    <a class="hamburgerMenu__list-link" href="#0">Body care</a>
                                </li>
                                <li class="hamburgerMenu__list-item" @click="addTitle('Decorative cosmetics')" :class="{'active' : listItemActive && title === 'Decorative cosmetics'}">
                                    <span>Decorative cosmetics</span>
                                    <img class="hamburgerMenu__list-item-icon" src="/icons/header/arrow_down.svg" alt="arrow_icon">
                                    <ul class="hamburgerMenu__list-children">
                                        <li class="hamburgerMenu__list-itemHead">
                                            <img class="hamburgerMenu__list-back"
                                                 src="/icons/header/arrow_down.svg" alt="arrow_icon"
                                                 @click.stop="listItemActive = !listItemActive"
                                            >
                                            <img class="hamburgerMenu__list-close"
                                                 src="/icons/hamburger/close_icon.svg" alt="close_icon"
                                                 @click="hamburgerMenuActive = !hamburgerMenuActive"
                                            >
                                        </li>
                                        <li class="hamburgerMenu__list-itemTitle">{{ title }}</li>
                                        <li class="hamburgerMenu__list-item">
                                            <a class="hamburgerMenu__list-link" href="#0">Bronzers1</a>
                                        </li>
                                        <li class="hamburgerMenu__list-item">
                                            <a class="hamburgerMenu__list-link" href="#0">Deodorants2</a>
                                        </li>
                                        <li class="hamburgerMenu__list-item">
                                            <a class="hamburgerMenu__list-link" href="#0">Tanning oils3</a>
                                        </li>
                                        <li class="hamburgerMenu__list-item">
                                            <a class="hamburgerMenu__list-link" href="#0">Shower gels4</a>
                                        </li>
                                        <li class="hamburgerMenu__list-item">
                                            <a class="hamburgerMenu__list-link" href="#0">Creams5</a>
                                        </li>
                                        <li class="hamburgerMenu__list-item">
                                            <a class="hamburgerMenu__list-link" href="#0">Soap6</a>
                                        </li>
                                        <li class="hamburgerMenu__list-item">
                                            <a class="hamburgerMenu__list-link" href="#0">Scrubs7</a>
                                        </li>
                                        <li class="hamburgerMenu__list-item">
                                            <a class="hamburgerMenu__list-link" href="#0">Oils8</a>
                                        </li>
                                        <li class="hamburgerMenu__list-item">
                                            <a class="hamburgerMenu__list-link" href="#0">Oils9</a>
                                        </li>
                                        <li class="hamburgerMenu__list-item">
                                            <a class="hamburgerMenu__list-link" href="#0">Oils10</a>
                                        </li>
                                        <li class="hamburgerMenu__list-item">
                                            <a class="hamburgerMenu__list-link" href="#0">Oils11</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="hamburgerMenu__list-item">
                                    <a class="hamburgerMenu__list-link" href="#0">Hair care</a>
                                </li>
                                <li class="hamburgerMenu__list-item">
                                    <a class="hamburgerMenu__list-link" href="#0">Face care</a>
                                </li>
                                <li class="hamburgerMenu__list-item" @click="addTitle('Vitamins')" :class="{'active' : listItemActive && title === 'Vitamins'}">
                                    <span>Vitamins</span>
                                    <img class="hamburgerMenu__list-item-icon" src="/icons/header/arrow_down.svg" alt="arrow_icon">
                                    <ul class="hamburgerMenu__list-children">
                                        <li class="hamburgerMenu__list-itemHead">
                                            <img class="hamburgerMenu__list-back"
                                                 src="/icons/header/arrow_down.svg" alt="arrow_icon"
                                                 @click.stop="listItemActive = !listItemActive"
                                            >
                                            <img class="hamburgerMenu__list-close"
                                                 src="/icons/hamburger/close_icon.svg" alt="close_icon"
                                                 @click="hamburgerMenuActive = !hamburgerMenuActive"
                                            >
                                        </li>
                                        <li class="hamburgerMenu__list-itemTitle">{{ title }}</li>
                                        <li class="hamburgerMenu__list-item">
                                            <a class="hamburgerMenu__list-link" href="#0">Bronzers</a>
                                        </li>
                                        <li class="hamburgerMenu__list-item">
                                            <a class="hamburgerMenu__list-link" href="#0">Deodorants</a>
                                        </li>
                                        <li class="hamburgerMenu__list-item">
                                            <a class="hamburgerMenu__list-link" href="#0">Tanning oils</a>
                                        </li>
                                        <li class="hamburgerMenu__list-item">
                                            <a class="hamburgerMenu__list-link" href="#0">Shower gels</a>
                                        </li>
                                        <li class="hamburgerMenu__list-item">
                                            <a class="hamburgerMenu__list-link" href="#0">Creams</a>
                                        </li>
                                        <li class="hamburgerMenu__list-item">
                                            <a class="hamburgerMenu__list-link" href="#0">Soap</a>
                                        </li>
                                        <li class="hamburgerMenu__list-item">
                                            <a class="hamburgerMenu__list-link" href="#0">Scrubs</a>
                                        </li>
                                        <li class="hamburgerMenu__list-item">
                                            <a class="hamburgerMenu__list-link" href="#0">Oils</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="hamburgerMenu__list-item">
                                    <a class="hamburgerMenu__list-link" href="#0">Accessories</a>
                                </li>
                                <li class="hamburgerMenu__list-item">
                                    <a class="hamburgerMenu__list-link" href="#0">Massagers</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <img class="headerMini__logo" src="/icons/header/logo.svg" alt="logo_icon">
            </div>
            <div class="headerMini__right">
                <a class="likesWrapper" href="#0">
                    <img class="likes" src="/icons/header/like_icon.svg" alt="likes_icon">
                    <span>0</span>
                </a>
                <a class="basketWrapper" href="#0">
                    <img class="basket" src="/icons/header/basket_icon.svg" alt="basket_icon">
                    <span>0</span>
                </a>
                <div class="dropdown dropdown_userMini" @click="activeUserMini = !activeUserMini" :class="{'active' : activeUserMini}">
                    <img class="dropdown__userIcon" src="/icons/header/user_icon.svg" alt="user_icon">
                    <img class="dropdown__arrowIcon" src="/icons/header/arrow_down.svg" alt="arrow_down">
                    <div class="optionsContainer">
                        <a href="#0" class="option">Şəxsi Kabinet</a>
                        <a href="#0" class="option">Ödəniş tarixçəsi</a>
                        <a href="#0" class="option">Çıxış</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>

<script>
export default {
    data() {
        return {
            activeLang: false,
            activeCurrency: false,
            activeUser: false,
            activeUserMini: false,
            activeHeaderNav: false,
            hamburgerMenuActive: false,
            listItemActive: false,
            title: ''
        }
    },
    methods: {
        addTitle(title) {
            this.listItemActive = !this.listItemActive;
            this.title = title;
        }
    }
}
</script>

<style scoped>

</style>
