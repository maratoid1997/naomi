<template>
    <header
        class="header"
        :class="{
            scrolling: isScrolling,
            active: drawerVisible
        }"
    >
        <div class="header-top d-none d-lg-block">
            <b-container fluid>
                <b-row>
                    <b-col class="flex">
                        <div class="header-top__left">
                            <lang-switcher />
                            <currency-switcher />
                        </div>

                        <div class="header-top__right">
                            <search-block />

                            <template>
                                <user-dropdown v-if="$auth.$state.loggedIn" />
                                <div v-else class="auth">
                                    <nuxt-link :to="$localePath('auth-login')">
                                        <i class="icon-login"></i>
                                        {{ $t("login") }}
                                    </nuxt-link>
                                </div>
                            </template>
                        </div>
                    </b-col>
                </b-row>
            </b-container>
        </div>
        <!-- header top -->

        <div class="header-bottom">
            <b-container fluid>
                <b-row>
                    <b-col class="flex">
                        <div class="header-bottom__left">
                            <div class="menu-toggler d-lg-none" @click="toggleDrawer" >
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>

                            <nuxt-link class="logo" :to="$localePath('index')">
                                <img src="~/assets/images/logo.svg" alt="Logo" />
                            </nuxt-link>
                        </div>

                        <div class="header-bottom__right">
                            <main-menu :menuTree="menuTree" />
                            <user-favorites />
                            <user-cart id="user-cart" />
                            <user-dropdown-mobile />
                        </div>
                    </b-col>
                </b-row>
            </b-container>
        </div>
        <!-- header bottom -->

        <side-drawer :menuTree="menuTree" />
    </header>
</template>

<script>
import { mapGetters } from "vuex";
import LangSwitcher from "@/components/ui/LangSwitcher";
import CurrencySwitcher from "@/components/ui/CurrencySwitcher";
import SearchBlock from "@/components/ui/SearchBlock";
import MainMenu from "@/components/ui/MainMenu";
import UserDropdown from "@/components/ui/UserDropdown";
import UserDropdownMobile from "@/components/ui/UserDropdownMobile";
import UserFavorites from "@/components/ui/UserFavorites";
import UserCart from "@/components/ui/UserCart";
import SideDrawer from "@/components/layout/SideDrawer";

export default {
    components: {
        LangSwitcher,
        CurrencySwitcher,
        SearchBlock,
        MainMenu,
        UserDropdown,
        UserDropdownMobile,
        UserFavorites,
        UserCart,
        SideDrawer
    },
    watch: {
        $route() {
            this.drawerVisible = false;
            document.body.style.overflow = "auto";
        },
    },
    data() {
        return {
            isScrolling: false,
            drawerVisible: false
        };
    },
    computed: {
        ...mapGetters({
            menuTree: "home/getMenu"
        })
    },
    mounted() {
        window.addEventListener("scroll", this.throttle(this.handleScroll, 100));
    },
    methods: {
        handleScroll() {
            if (window.scrollY > 100) {
                this.isScrolling = true;
            } else {
                this.isScrolling = false;
            }
        },

        toggleDrawer() {
            this.drawerVisible = !this.drawerVisible;
            
            if (this.drawerVisible) {
                document.body.style.overflow = "hidden";
                return;
            }

            document.body.style.overflow = "auto";
        },

        throttle(func, ms) {
            let isThrottled = false,
                savedArgs,
                savedThis;

            function wrapper() {
                if (isThrottled) {
                    // запоминаем последние аргументы для вызова после задержки
                    savedArgs = arguments;
                    savedThis = this;
                    return;
                }

                // в противном случае переходим в состояние задержки
                func.apply(this, arguments);
                isThrottled = true;

                // настройка сброса isThrottled после задержки
                setTimeout(function() {
                    isThrottled = false;
                    if (savedArgs) {
                        // если были вызовы, savedThis/savedArgs хранят последний из них
                        // рекурсивный вызов запускает функцию и снова устанавливает время задержки
                        wrapper.apply(savedThis, savedArgs);
                        savedArgs = savedThis = null;
                    }
                }, ms);
            }

            return wrapper;
        }
    }
};
</script>
